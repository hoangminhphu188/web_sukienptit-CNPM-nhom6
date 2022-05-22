@extends('layouts.base') // thông báo về các lỗi khác xảy ra trong hoạt động web
@section('body')

    <body>
        <div class="container pt-5 mt-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="error-template">
                        <h1>Oops!</h1>
                        <h2>404 Not Found</h2>
                        <div class="error-details">
                            We're sorry, but something went wrong. We are working an fixing this.
                            <br />
                            Please refresh the page in a couple of seconds.</p>
                        </div>
                        <div class="error-actions">
                            <a href="{{ route('home') }}" class="btn btn-primary btn-lg">
                                Take Me Home
                            </a>
                            <a href="https://www.facebook.com/luongnguyensdptit/" class="btn btn-default btn-lg"> Contact Support</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection
