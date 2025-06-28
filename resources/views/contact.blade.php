@extends('layout')

@section('sadrzajStranice')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <h2 class="mb-4">Contact Us</h2>

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="/send-contact" method="POST" class="bg-light p-4 border rounded shadow-sm">
                    @csrf

                    @if($errors->any())
                        <div class="alert alert-danger mb-3">
                            Greska: {{ $errors->first() }}
                        </div>
                    @endif

                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
                        <div class="form-text">We'll never share your email with anyone else.</div>
                    </div>

                    <div class="mb-3">
                        <label for="subject" class="form-label">Subject</label>
                        <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter subject">
                    </div>

                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" id="message" name="message" rows="6" placeholder="Type your message here..."></textarea>
                    </div>

                    <button type="submit" class="btn btn-success">Submit</button>
                </form>

                <hr class="my-5">

                <h4 class="mb-3">Our Location</h4>

                <div class="ratio ratio-16x9">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11320.25243102201!2d20.42503238206243!3d44.820278973071126!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475a6542eb9f8ddb%3A0xdae2bd5c2454046a!2z0J_QsNGA0Log0KPRiNGb0LU!5e0!3m2!1ssr!2srs!4v1750877905642!5m2!1ssr!2srs"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>

            </div>
        </div>
    </div>
@endsection
