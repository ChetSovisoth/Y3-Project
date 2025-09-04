@extends('layout.layout')

@section('content')
    <div class="text-white d-flex flex-column align-items-center justify-content-center mt-5 main-container">
        <h1 class="fw-bold">Mentorship</h1>
        <p class="lead w-50 text-center">
            Your online mentor can elevate your career or be a shoulder to lean on. Get a personalized
            mentoring program, including curated study plans, regular check-ins, and unlimited actionable support.
            Be part of an online mentor community that spans across the globe.
        </p>
        <div class="d-flex align-items-center justify-content-center mt-4">
            @if (Route::has('login'))
                <nav class="flex flex-1 justify-end">
                    @auth
                        @if (Auth::user()->role === 'student')
                            <a href="{{ route('discover.mentor') }}"
                                class="btn btn-secondary btn-lg px-5 py-2 rounded-5 me-3" wire:navigate.prevent>
                                Get Started
                            </a>   
                        @endif
                    @else
                        <a href="{{ route('login') }}"
                            class="btn btn-secondary btn-lg px-5 py-2 rounded-5 ms-3" wire:navigate.prevent>
                            Log in
                        </a>
                    @endauth
                </nav>
            @endif
        </div>
    </div>
    <div class='d-flex align-items-center flex-column my-3 text-white '>
        <h2 class='text-center mt-0 mb-2' style="width: 500px; margin-top: 3rem;">
            Learn that new skill, launch that project, land your dream career.
        </h2>
        <p class="lead text-center w-50 mt-1">
            Your online mentor can elevate your career or be a shoulder to lean on. Get a personalized
            mentoring program, including curated study plans, regular check-ins, and unlimited actionable
            support. Be part of an online mentor community that spans across the globe.
        </p>
    </div>
    <div class='d-flex flex-column flex-md-row justify-content-around align-items-center'>
        <div class='text-white text-center mb-4 mb-md-0'>
            <h2 class='mb-5' style="max-width: 500px;">
                Expert mentorship. One text away.
            </h2>
            <p class="lead" style="max-width: 500px;">
                Ask questions, kick the tires on a new idea, or discuss professional progress and improvements in your
                online mentoring sessions with unlimited messaging. Have an upcoming interview at Amazon? Need help in
                product management or marketing? Whatever it is, our online mentors are there for you. Fewer
                interruptions in your day-to-day and easier documentation. A text away, get expert guidance at your
                convenience from your mentor.
            </p>
        </div>
        <div class='text-center rotate-45'>
            <div class='bg-warning-subtle rounded-5'>
                <img src="https://crestcom.com/wp-content/uploads/2022/07/AdobeStock_128345842-scaled.jpeg"
                    alt="picture" style="width: 350px; height: 350px; border-radius: 20px; object-fit:cover;" class='m-4 rotate--45' />
            </div>
        </div>
    </div>
    <div class='d-flex flex-column flex-md-row justify-content-around align-items-center pt-5'>
        <div class='text-center rotate-45'>
            <div class='bg-secondary-subtle rounded-5'>
                <img src="https://twoearsonemouth.net/wp-content/uploads/2018/04/mentor.jpg?w=570&h=380"
                    alt="picture" style="width: 350px; height: 350px; border-radius: 20px; object-fit:cover;" class='m-4 rotate--45' />
            </div>
        </div>
        <div class='text-white text-center mb-4 mb-md-0'>
            <h2 class='mb-5' style="max-width: 500px;">
                Shortcut growth through expert guidance.
            </h2>
            <p class="lead" style="max-width: 500px;">
                Get invaluable knowledge from veterans and founders. Through effective mentorship, eliminate the time
                spent on figuring out your next steps. Get an action plan, and gain wisdom from consistent mentoring
                sessions.
            </p>
        </div>
    </div>
    <div class='d-flex flex-column flex-md-row justify-content-around align-items-center pt-5 '>
        <div class='text-white text-center mb-4 mb-md-0'>
            <h2 class='mb-5' style="max-width: 500px;">
                Talk it out. Face-to-face.
            </h2>
            <p class="lead" style="max-width: 500px;">
                Online mentorship shouldn&#8217;t compromise genuine interactions—enter video chat.
                When you&#8217;re stuck in a logjam, be it a design flaw, code defect, or business decision, skip the endless
                back-and-forth of essays and talk it out face-to-face with your mentor on video call.
            </p>
        </div>
        <div class='bg-success-subtle rounded-5'>
            <img src="https://assets.td.org/transform/345faa0e-368c-4b43-be9a-ddda19078499/Adobe-Stock-581974224-ai"
                alt="picture" style="width: 400px; height: 350px; border-radius: 20px; object-fit:cover;" class='m-4' />
        </div>
    </div>
    <div class='d-flex align-items-center flex-column my-5 text-white pt-5'>
        <h2 class='text-center m-4' style="width: 600px">
            An arsenal of industry veterans and mentoring packages at a flexible price.
        </h2>
        <p class="lead text-center w-50">
            Pick from a curated collection of mentors and services. Try them out for 7 days with no obligation. Found
            your mentoring sessions useful? Move to a low-cost, monthly mentoring subscription. No lock-ins, no hidden
            fees &#45; Just accelerated professional growth.
        </p>
    </div>
    @include('layout.footer')
@endsection
