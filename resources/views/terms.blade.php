@extends('shared.layouts.frontoffice')

@section('page-title', 'Terms of Use - SmartHealth Tracker')

@section('content')
    <!-- main-area -->
    <main class="main-area fix">

        <!-- breadcrumb-area -->
        <section class="breadcrumb__area breadcrumb__bg"
            data-background="{{ Vite::asset('resources/assets/img/bg/sd_bg.html') }}">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <div class="breadcrumb__content">
                            <h2 class="title">Terms of Use</h2>
                            <nav class="breadcrumb">
                                <span property="itemListElement" typeof="ListItem">
                                    <a href="/">Home</a>
                                </span>
                                <span class="breadcrumb-separator">|</span>
                                <span property="itemListElement" typeof="ListItem">Terms of Use</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section__bg-shape">
                <span class="bottom-shape"
                    data-background="{{ Vite::asset('resources/assets/img/bg/section_bg_shape02.svg') }}"></span>
            </div>
        </section>
        <!-- breadcrumb-area-end -->

        <!-- terms-area -->
        <section class="shop__area section-py-150">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8">
                        <div class="card">
                            <div class="card-body">
                                <h1 class="mb-4">Terms of Use</h1>
                                <p class="text-muted mb-4">Last updated: {{ date('F d, Y') }}</p>

                                <div class="terms-content">
                                    <h2>1. Acceptance of Terms</h2>
                                    <p>By accessing and using SmartHealth Tracker ("the Service"), you accept and agree to be bound by the terms and provision of this agreement. If you do not agree to abide by the above, please do not use this service.</p>

                                    <h2>2. Description of Service</h2>
                                    <p>SmartHealth Tracker is a comprehensive health and fitness tracking platform that provides users with tools to:</p>
                                    <ul>
                                        <li>Track physical activities and exercise sessions</li>
                                        <li>Monitor nutrition and meal planning</li>
                                        <li>Participate in fitness challenges</li>
                                        <li>Connect with other users for motivation and support</li>
                                        <li>Access personalized health recommendations</li>
                                    </ul>

                                    <h2>3. User Accounts</h2>
                                    <p>To access certain features of the Service, you must register for an account. You agree to:</p>
                                    <ul>
                                        <li>Provide accurate, current, and complete information during registration</li>
                                        <li>Maintain and update your account information</li>
                                        <li>Maintain the security of your password and account</li>
                                        <li>Accept responsibility for all activities under your account</li>
                                        <li>Notify us immediately of any unauthorized use of your account</li>
                                    </ul>

                                    <h2>4. Health Information and Medical Disclaimer</h2>
                                    <p><strong>IMPORTANT:</strong> SmartHealth Tracker is not a medical device or service. The information provided through our platform is for general informational purposes only and should not be considered as medical advice, diagnosis, or treatment.</p>
                                    <ul>
                                        <li>Always consult with qualified healthcare professionals before making health-related decisions</li>
                                        <li>Do not use our service as a substitute for professional medical advice</li>
                                        <li>Seek immediate medical attention for any health emergencies</li>
                                        <li>We are not responsible for any health outcomes resulting from the use of our platform</li>
                                    </ul>

                                    <h2>5. Privacy and Data Protection</h2>
                                    <p>Your privacy is important to us. Our collection and use of personal information is governed by our Privacy Policy, which is incorporated into these Terms by reference. By using our Service, you consent to the collection and use of information as outlined in our Privacy Policy.</p>

                                    <h2>6. User Conduct</h2>
                                    <p>You agree not to use the Service to:</p>
                                    <ul>
                                        <li>Violate any applicable laws or regulations</li>
                                        <li>Infringe on the rights of others</li>
                                        <li>Transmit harmful, threatening, or offensive content</li>
                                        <li>Attempt to gain unauthorized access to our systems</li>
                                        <li>Interfere with the proper functioning of the Service</li>
                                        <li>Use automated systems to access the Service without permission</li>
                                    </ul>

                                    <h2>7. Intellectual Property</h2>
                                    <p>The Service and its original content, features, and functionality are owned by SmartHealth Tracker and are protected by international copyright, trademark, patent, trade secret, and other intellectual property laws.</p>

                                    <h2>8. Subscription and Payment</h2>
                                    <p>Some features of our Service may require a paid subscription. By subscribing, you agree to:</p>
                                    <ul>
                                        <li>Pay all applicable fees as described during the subscription process</li>
                                        <li>Provide accurate billing information</li>
                                        <li>Authorize us to charge your payment method</li>
                                        <li>Understand that subscription fees are non-refundable unless otherwise stated</li>
                                    </ul>

                                    <h2>9. Termination</h2>
                                    <p>We may terminate or suspend your account immediately, without prior notice, for conduct that we believe violates these Terms or is harmful to other users, us, or third parties, or for any other reason at our sole discretion.</p>

                                    <h2>10. Limitation of Liability</h2>
                                    <p>To the maximum extent permitted by law, SmartHealth Tracker shall not be liable for any indirect, incidental, special, consequential, or punitive damages, including without limitation, loss of profits, data, use, goodwill, or other intangible losses, resulting from your use of the Service.</p>

                                    <h2>11. Changes to Terms</h2>
                                    <p>We reserve the right to modify or replace these Terms at any time. If a revision is material, we will try to provide at least 30 days notice prior to any new terms taking effect.</p>

                                    <h2>12. Contact Information</h2>
                                    <p>If you have any questions about these Terms of Use, please contact us at:</p>
                                    <ul>
                                        <li>Email: legal@smarthealthtracker.com</li>
                                        <li>Address: SmartHealth Tracker Legal Department, 123 Health Street, Wellness City, WC 12345</li>
                                    </ul>

                                    <div class="mt-5 p-4 bg-light rounded">
                                        <p class="mb-0"><strong>By using SmartHealth Tracker, you acknowledge that you have read, understood, and agree to be bound by these Terms of Use.</strong></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- terms-area-end -->

    </main>
    <!-- main-area-end -->
@endsection

@section('styles')
<style>
.terms-content h2 {
    color: #22c55e;
    margin-top: 2rem;
    margin-bottom: 1rem;
    font-size: 1.5rem;
}

.terms-content h1 {
    color: #22c55e;
    margin-bottom: 1rem;
}

.terms-content ul {
    margin-bottom: 1.5rem;
}

.terms-content li {
    margin-bottom: 0.5rem;
}

.terms-content p {
    margin-bottom: 1rem;
    line-height: 1.6;
}

.card {
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    border: none;
}

.card-body {
    padding: 3rem;
}
</style>
@endsection
