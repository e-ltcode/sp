<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>

<body
    style="margin: 0;padding: 0;font-family: 'Helvetica Neue','Helvetica', 'Helvetica', 'Arial', 'sans-serif'; box-sizing: border-box; font-size: 14px; -webkit-font-smoothing: antialiased;
    -webkit-text-size-adjust: none; width: 100% !important; height: 100%;  line-height: 1.6; background-color: #f6f6f6;">
    <div class="body-wrap" style="  background-color: #f6f6f6;
    width: 100%;">
        <div
            style="display:block!important;max-width:600px!important;margin:0 auto!important;clear:both!important; width:600px;">
            <div style="max-width:600px;margin:0 auto;display:block;padding:20px">
                <div class="main" width="100%"
                    style="background: #fff; border: 1px solid #e9e9e9; border-radius: 3px; max-width:600px;padding:32px; margin:0 auto;display:block;padding:20px">
                    <div style="padding:0 0 20px;text-align: center;">
                        <a class="navbar-brand " href="{{ url('/') }}"
                            style="color: #1ab394; text-decoration: underline;">
                            <img src="https://ci5.googleusercontent.com/proxy/pDRku_Zvmg9_7VsvliVqG4z0qfSFq9I3m3RPmLEWkEFoTfwxk1ncSFQVCHVADneDMr6d2dKPMrBWX1G2AytDw3v-ppsAGGgRvPKecXCehA=s0-d-e1-ft#https://svarogproject.com/public//assets/images/new_logo.png"
                                style="width:360px;max-width:100%">
                        </a>
                    </div>
                    <div style="color:black;font-weight:bold;font-size:20px;">
                        <b>
                            {{-- Greeting --}}
                            @if (! empty($greeting))
                            {{ $greeting }}
                            @else
                            @if ($level === 'error')
                            @lang('Whoops!')
                            @else
                            @lang('Hello!')
                            @endif
                            @endif
                        </b>
                    </div>
                    <div>
                        @foreach ($introLines as $line)
                        {{ $line }}

                        @endforeach
                    </div>
                    <div
                        style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol'; margin: 20px 0px;">
                        @isset($actionText)
                        <?php
                        switch ($level) {
                        case 'success':
                        case 'error':
                        $color = $level;
                         break;
                         default:
                       $color = 'primary';
                        }
                        ?>
                        @component('mail::button', ['url' => $actionUrl, 'color' => $color])
                        {{ $actionText }}
                        @endcomponent
                        @endisset

                        @foreach ($outroLines as $line)
                        {{ $line }}
                        @endforeach
                    </div>
                    <div>
                        {{-- Salutation --}}
                        @if (! empty($salutation))
                        {{ $salutation }}
                        @else
                        @lang('Regards'),<br>
                        {{ config('app.name') }}
                        @endif
                    </div>
                    <div class="margin:20px 0px;">
                        <hr>
                    </div>
                    <div
                        style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol'">
                        <p
                            style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';line-height:1.5em;margin-top:0;text-align:left;font-size:14px">
                            If you're having trouble clicking the "Reset Password" button, copy and paste the URL below
                            into your web browser: <span
                                style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';word-break:break-all"><a
                                    href="http://localhost/larave-quiz-project/password/reset/4a5e59998f841b315a30698023afacfa6b4e316f52961ef5b0b1c478ad765d1a?email=abmasood5900%40gmail.com"
                                    style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';color:#3869d4"
                                    target="_blank"
                                    data-saferedirecturl="https://www.google.com/url?q=http://localhost/larave-quiz-project/password/reset/4a5e59998f841b315a30698023afacfa6b4e316f52961ef5b0b1c478ad765d1a?email%3Dabmasood5900%2540gmail.com&amp;source=gmail&amp;ust=1641124894150000&amp;usg=AOvVaw0RS-eGZp6Xbsp9WI4J_Sf9">http://localhost/larave-quiz-<wbr>project/password/reset/<wbr>4a5e59998f841b315a30698023afac<wbr>fa6b4e316f52961ef5b0b1c478ad76<wbr>5d1a?email=abmasood5900%<wbr>40gmail.com</a></span>
                        </p>
                    </div>
                </div>
                <div style="margin-top:30px;">
                    <p
                        style="text-align: center;font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-size: 12px;">
                        Copyright © 2022 SvarogProject, all Rights Reserved
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>