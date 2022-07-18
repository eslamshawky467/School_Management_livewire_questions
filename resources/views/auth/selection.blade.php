<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="utf-8">


    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.ico" />

    <!-- Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">

    <!-- css -->
    <link href="{{ URL::asset('assets/css/rtl.css') }}" rel="stylesheet">




</head>

<body>

<div class="wrapper">
    <section class="height-100vh d-flex align-items-center page-section-ptb login"
             style="background-image: url('{{ asset('assets/images/eslamscho.jpg')}}');">
        <div class="container">
            <div class="row justify-content-center no-gutters vertical-align">

                <div style="border-radius: 15px;" class="col-lg-6 col-md-8 bg-white">
                    <div class="login-fancy pb-40 clearfix">
                        <h3 style="font-family: 'Cairo', sans-serif" class="mb-30">حدد طريقة الدخول</h3>
                        <div class="form-inline">
                            <a class="btn btn-default col-lg-4" title="طالب" href="{{route('login.show','student')}}">
                                <img alt="user-img" width="100px;" src="{{URL::asset('assets/images/students.jpg')}}">
                            </a>
                            <a class="btn btn-default col-lg-4" title="ولي امر" href="{{route('login.show','parent')}}">
                                <img alt="user-img" width="100px;" src="{{URL::asset('assets/images/father.jpeg')}}">
                            </a>
                            <a class="btn btn-default col-lg-4" title="معلم" href="{{route('login.show','teacher')}}">
                                <img alt="user-img" width="100px;" src="{{URL::asset('assets/images/teachers.jpg')}}">
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--=================================
login-->

</div>
<!-- jquery -->
<script src="{{ URL::asset('assets/js/jquery-3.3.1.min.js') }}"></script>
<!-- plugins-jquery -->
<script src="{{ URL::asset('assets/js/plugins-jquery.js') }}"></script>
<!-- plugin_path -->
<script>
    var plugin_path = 'js/';
</script>


<!-- toastr -->
@yield('js')
<!-- custom -->
<script src="{{ URL::asset('assets/js/custom.js') }}"></script>

</body>

</html>
