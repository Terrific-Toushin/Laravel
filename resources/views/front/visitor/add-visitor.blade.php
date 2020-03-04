@extends('front.master')

@section('title')
    Home
@endsection

@section('body')
    <header class="masthead" style="background-image: url('{{ asset('/') }}front/img/home-bg.jpg')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                        <h1>Clean Blog</h1>
                        <span class="subheading">A Blog Theme by Start Bootstrap</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <section class="p-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-body">
                        <form action="{{ route('new-visitor') }}" method="post">
                            @csrf
                            <div class="form-group row">
                                <label class="col-md-3">First Name</label>
                                <div class="col-md-9">
                                    <input type="text" name="first_name" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3">Last Name</label>
                                <div class="col-md-9">
                                    <input type="text" name="last_name" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3">Email Address</label>
                                <div class="col-md-9">
                                    <input type="email" name="email_address" class="form-control" onblur="ajaxEmailCheck(this.value); "/>
                                    <span id="res"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3">Password</label>
                                <div class="col-md-9">
                                    <input type="password" name="password" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3">Address</label>
                                <div class="col-md-9">
                                    <textarea name="address" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3">Phone Number</label>
                                <div class="col-md-9">
                                    <input type="number" name="phone_number" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3"></label>
                                <div class="col-md-9">
                                    <input type="submit" id="btn" class="btn btn-success" value="Register Now"/>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        function ajaxEmailCheck(email) {
            $.ajax({
                url     : 'http://localhost:8099/blog/public/email/ajax-email-check/'+email,
                method  : 'GET',
                type    : 'JSON',
                data    : {email: email},
                success : function (response) {
                    $('#res').text(response);
                    if(response == 'Email Address Already Exists') {
                        $('#btn').prop('disabled', true);
                    } else {
                        $('#btn').prop('disabled', false);
                    }
                }
            });
        }


//        function ajaxEmailCheck(email) {
//            var xmlHttp =new XMLHttpRequest();
//            var server = 'http://localhost:8099/blog/public/email/ajax-email-check/'+email;
//            xmlHttp.open('GET', server);
//            xmlHttp.onreadystatechange = function () {
//                if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
//                    document.getElementById('res').innerHTML = xmlHttp.responseText;
//                    if(xmlHttp.responseText == 'Email Address Already Exists') {
//                        document.getElementById('btn').disabled = true;
//                    } else {
//                        document.getElementById('btn').disabled = false;
//                    }
//                }
//            }
//            xmlHttp.send();
//        }
    </script>
@endsection


