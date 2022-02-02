<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body
    style="margin: 0;padding: 0;font-family: 'Helvetica Neue','Helvetica', 'Helvetica', 'Arial', 'sans-serif'; box-sizing: border-box; font-size: 14px; -webkit-font-smoothing: antialiased;
    -webkit-text-size-adjust: none; width: 100% !important; height: 100%;  line-height: 1.6; background-color: #f6f6f6;">
    {{-- @dd($order_id) --}}
    <form action="{{ url('send-email') }}" method="POST" id="email_form">
        @csrf
        <table class="body-wrap" style="  background-color: #f6f6f6;
        width: 100%;">
            <tbody>
                <tr>
                    <td style="vertical-align: top;"></td>
                    <td class="container" width="600"
                        style="vertical-align: top; display: block !important; max-width: 600px !important; margin: 0 auto !important; clear: both !important;">
                        <div class="content" style="max-width: 600px; margin: 0 auto; display: block; padding: 20px;">
                            <table class="main" width="100%" cellpadding="0" cellspacing="0"
                                style="background: #fff; border: 1px solid #e9e9e9; border-radius: 3px;">
                                <tbody>
                                    <tr>
                                        <td class="content-wrap aligncenter"
                                            style="vertical-align: top; text-align: center; padding: 20px;">
                                            <table width="100%" cellpadding="0" cellspacing="0">
                                                <tbody>
                                                    <tr>
                                                        <td class="content-block"
                                                            style="vertical-align: top; padding: 0 0 20px;">
                                                            <a class="navbar-brand " href="{{ url('/') }}"
                                                                style="color: #1ab394; text-decoration: underline;">
                                                                <img src="https://ci5.googleusercontent.com/proxy/pDRku_Zvmg9_7VsvliVqG4z0qfSFq9I3m3RPmLEWkEFoTfwxk1ncSFQVCHVADneDMr6d2dKPMrBWX1G2AytDw3v-ppsAGGgRvPKecXCehA=s0-d-e1-ft#https://svarogproject.com/public//assets/images/new_logo.png"
                                                                    class="img-fluid logo_img"
                                                                    style="width: 360px; max-width: 100%;">
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="content-block"
                                                            style="vertical-align: top; padding: 0 0 20px;">
                                                            <table class="invoice"
                                                                style="margin: 40px auto; text-align: left; width: 80%;">
                                                                <tbody>
                                                                    <tr>
                                                                        <td
                                                                            style="vertical-align: top; padding: 5px 0;">
                                                                            <b>{{ $name
                                                                                }}</b><br>June 01 2015
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td
                                                                            style="vertical-align: top; padding: 5px 0;">
                                                                            <table class="invoice-items"
                                                                                style=" width: 100%;" cellpadding="0"
                                                                                cellspacing="0">
                                                                                <tbody>
                                                                                    {{-- @dd($quiz) --}}
                                                                                    @foreach ($quiz as $data)
                                                                                    <tr>
                                                                                        <td
                                                                                            style="vertical-align: top; border-top: #eee 1px solid; padding: 5px 0;">
                                                                                            {{
                                                                                            $data['quiz_title'] }}
                                                                                        </td>
                                                                                        <td class="alignright"
                                                                                            style="vertical-align: top; border-top: #eee 1px solid; text-align: right;">
                                                                                            {{
                                                                                            $data['price'] }}$ </td>
                                                                                    </tr>
                                                                                    @endforeach
                                                                                    <tr class="total">
                                                                                        <td class="alignright"
                                                                                            width="80%"
                                                                                            style="vertical-align: top; border-top: 2px solid #333;
                                                                                            border-bottom: 2px solid #333;
                                                                                            font-weight: 700; padding: 5px 0; text-align: right;">
                                                                                            Total</td>
                                                                                        <td class="alignright"
                                                                                            style="vertical-align: top; border-top: 2px solid #333;
                                                                                            border-bottom: 2px solid #333;
                                                                                            font-weight: 700; padding: 5px 0; text-align: right;">
                                                                                            {{ $total }}$
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="content-block"
                                                            style="vertical-align: top; padding: 0 0 20px;">
                                                            <p style=" margin-bottom: 10px; font-weight: normal;">
                                                                Copyright &copy; 2022 SvarogProject, all
                                                                Rights
                                                                Reserved </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="vertical-align: top;">
                                                            <a href="{{ url('') }}"
                                                                style="color: #1ab394; text-decoration: underline;">Home</a>
                                                            <a href="{{ url('marketplace') }}"
                                                                style="color: #1ab394; text-decoration: underline;">Marketplace</a>
                                                            <a href="{{ url('privacy') }}"
                                                                style="color: #1ab394; text-decoration: underline;">Privacy
                                                                Policy</a>
                                                            <a href="{{ url('terms') }}"
                                                                style="color: #1ab394; text-decoration: underline;">Terms
                                                                & Conditions</a>
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="footer" style="width: 100%;
                            clear: both;
                            color: #999;
                            padding: 20px;">
                                <table width="100%">
                                    <tbody>
                                        <tr>
                                            <input type="hidden" value="{{ $id }}" class="form-control" name="id">
                                            <input type="hidden" value="{{ $order_id }}" class="form-control"
                                                name="order_id">
                                            <input type="hidden" value="{{ $email }}" class="form-control"
                                                name="quiz[email][]">
                                            <input type="hidden" value="{{ $name }}" class="form-control" name="user">
                                            @foreach ($quiz as $data)
                                            <input type="hidden" value="{{ $data['quiz_title'] }}" class="form-control"
                                                name="quiz[title][]">
                                            @endforeach
                                            @foreach ($quiz as $data)
                                            <input type="hidden" value="{{ $data['price'] }}" class="form-control"
                                                name="quiz[price][]">
                                            @endforeach
                                            <input type="hidden" value="{{ $total }}" class="form-control"
                                                name="quiz[total]">
                                            <td class="aligncenter content-block"
                                                style="vertical-align: top; text-align: center; padding: 0 0 20px; font-size: 12px;">
                                                Questions?
                                                <a href="mailto: abc@example.com" style="color: #999; font-size: 12px; color: #1ab394;
                                                    text-decoration: underline;">mail@info.com</a>
                                            </td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>

    <script>
        let url = window.location.href;
        if(url.indexOf('/email')){
            document.getElementById('email_form').submit();
        }
    </script>
</body>

</html>