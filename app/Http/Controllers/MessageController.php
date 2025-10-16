<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Events\MessageSent;
use Illuminate\Support\Facades\Log;
use App\Models\Challenge;
use Illuminate\Support\Facades\Auth;


class MessageController extends Controller
{
    // Afficher la page de chat
   public function index()
{
    // Récupère tous les messages pour l'utilisateur connecté (inbox)
    $messages = Message::with('sender', 'recipient')
                       ->where('from_user_id', auth()->id())
                       ->orWhere('to_user_id', auth()->id())
                       ->orderBy('created_at', 'asc')
                       ->get();

    return view('chat', compact('messages')); // Updated path
}

    // Envoyer un message (POST)
public function send(Request $request)
{
    Log::info('POST /messages', ['request' => $request->all(), 'user_id' => auth()->id()]);

    try {
        // Validate the request
        $validated = $request->validate([
            'to_user_id' => 'required|exists:users,id',
            'body' => 'required|string|max:1000',
        ]);

        // Create the message
        $message = Message::create([
            'from_user_id' => auth()->id(),
            'to_user_id' => $validated['to_user_id'],
            'body' => $validated['body'],
        ]);

        // Load sender relationship for the event
        $message->load('sender');

        // Trigger the MessageSent event
        event(new MessageSent($message));

        // Return JSON response
        return response()->json([
            'status' => 'success',
            'message' => 'Message sent successfully',
            'data' => [
                'id' => $message->id,
                'body' => $message->body,
                'sender' => [
                    'id' => $message->from_user_id,
                    'name' => $message->sender->name,
                ],
            ],
        ], 201);
    } catch (\Illuminate\Validation\ValidationException $e) {
        Log::error('Validation error: ' . json_encode($e->errors()));
        return response()->json(['status' => 'error', 'errors' => $e->errors()], 422);
    } catch (\Exception $e) {
        Log::error('Error sending message: ' . $e->getMessage());
        return response()->json(['status' => 'error', 'message' => 'Failed to send message'], 500);
    }
}


  public function groupIndex($challengeId)
       {
           Log::info('Accessing group chat', ['user_id' => Auth::id(), 'challenge_id' => $challengeId]);

           if (!Auth::check()) {
               return redirect()->route('login')->with('error', 'You must be logged in to access the group chat.');
           }

           $challenge = Challenge::findOrFail($challengeId);

           if (!$challenge->isParticipatedBy(Auth::id())) {
               abort(403, 'You must be the challenge creator or a participant to join the group chat.');
           }

           $messages = Message::with('sender')
                              ->where('challenge_id', $challengeId)
                              ->orderBy('created_at', 'asc')
                              ->get();

           return view('frontoffice.challenges.group_chat', compact('messages', 'challenge'));
       }

       public function getMessages($challengeId)
       {
           Log::info('Fetching messages for challenge', ['user_id' => Auth::id(), 'challenge_id' => $challengeId]);

           if (!Auth::check()) {
               return response()->json(['status' => 'error', 'message' => 'Unauthorized'], 401);
           }

           $challenge = Challenge::findOrFail($challengeId);

           if (!$challenge->isParticipatedBy(Auth::id())) {
               return response()->json(['status' => 'error', 'message' => 'You must be the creator or a participant'], 403);
           }

           $messages = Message::with('sender')
                              ->where('challenge_id', $challengeId)
                              ->orderBy('created_at', 'asc')
                              ->get();

           return response()->json([
               'status' => 'success',
               'challenge' => ['titre' => $challenge->titre],
               'messages' => $messages->map(function ($msg) {
                   return [
                       'id' => $msg->id,
                       'body' => $msg->body,
                       'sender' => [
                           'id' => $msg->from_user_id,
                           'name' => $msg->sender->name
                       ]
                   ];
               })
           ]);
       }

       public function sendGroup(Request $request, $challengeId)
       {
           Log::info('POST /challenges/{id}/messages', [
               'request' => $request->all(),
               'user_id' => Auth::id(),
               'challenge_id' => $challengeId
           ]);

           try {
               $challenge = Challenge::findOrFail($challengeId);

               if (!$challenge->isParticipatedBy(Auth::id())) {
                   return response()->json([
                       'status' => 'error',
                       'message' => 'You must be the challenge creator or a participant to send messages.'
                   ], 403);
               }

               $request->validate([
                   'body' => 'required|string|max:1000',
               ]);

               $message = Message::create([
                   'from_user_id' => Auth::id(),
                   'challenge_id' => $challengeId,
                   'body' => $request->body,
               ]);

               $message->load('sender');
               Log::info('Message created', [
                   'message_id' => $message->id,
                   'challenge_id' => $message->challenge_id,
                   'from_user_id' => $message->from_user_id,
                   'body' => $message->body
               ]);

               event(new MessageSent($message));
               Log::info('MessageSent event triggered', ['message_id' => $message->id]);

               return response()->json([
                   'status' => 'success',
                   'message' => 'Group message sent successfully',
                   'data' => [
                       'id' => $message->id,
                       'body' => $message->body,
                       'sender' => [
                           'id' => $message->from_user_id,
                           'name' => $message->sender->name,
                       ],
                   ],
               ], 201);
           } catch (\Illuminate\Validation\ValidationException $e) {
               Log::error('Validation error: ' . json_encode($e->errors()));
               return response()->json(['status' => 'error', 'errors' => $e->errors()], 422);
           } catch (\Exception $e) {
               Log::error('Error sending group message: ' . $e->getMessage(), ['trace' => $e->getTraceAsString()]);
               return response()->json(['status' => 'error', 'message' => 'Failed to send group message'], 500);
           }
       }
}
