@extends('main')
@section('title', '| Contact')
@section('content')
        <div class="row">
            <div class="col-md-12">
                <h1>Contact Me</h1>
                <hr>
                <form action="{{ url('contact') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="email" name="email">Email:</label>
                        <input type="text" id="email" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="subject" name="email">Subject:</label>
                        <input type="text" id="subject" name="subject" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="message" name="email">Message:</label>
                        <textarea name="message" id="message" rows="10" class="form-control">Type your message here...
                        </textarea>
                    </div>
                    <input type="submit" value="Send Message" class="btn btn-success">
                </form>    
            </div>
        </div>
@endsection