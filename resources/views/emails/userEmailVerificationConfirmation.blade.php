
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vocalforlocal.com</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('frontend/assets')}}/css/animate.css">
    <link rel="stylesheet" href="{{asset('frontend/assets')}}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{asset('frontend/assets')}}/css/owl.theme.default.css">
    <link rel="stylesheet" href="{{asset('frontend/assets')}}/css/style.css">
</head>
<body>

    <section style="padding-top: 35px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <table style="width: 100%; max-width: 640px; margin: 0 auto;">
                        <thead>
                            <tr>
                                <td style="text-align: center;"><a href="#"><img src="{{asset('frontend/assets')}}/images/logo.png" style="max-width: 287px;" alt="Vocalforlocal" /></a></td>
                            </tr>
                        </thead>
                        <tbody style="margin: 50px auto 0 !important; width: 100%; display: block; max-width: 560px; border: 1px solid #374850; border-radius: 10px;padding: 43px 35px;">
                            <tr>
                                <td style="font-size: 24px; font-weight: 600; color: #374850;">Hello Admin,</td>
                            </tr>
                            <tr>
                                <td style="font-size: 16px; color: #374850; line-height: 30px; font-weight: 400; margin-top: 15px; display: block;">
                                    {{$user->name}} has been successfully verified {{ $user->email }} this e-mail.
                                </td>
                            </tr>
                            <tr style="flex-direction: column; display: flex; margin-top: 30px;">
                                <td style="font-size: 16px; color: #374850; width: 100%; line-height: 30px;"> Thanks, </td>
                                <td style="font-size: 16px; color: #374850; width: 100%;line-height: 30px; ">Vocaal4local's Team </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr style="display: flex; flex-direction: column; background: #374850; padding: 26px 0 15px; margin-top: 27px;">
                                <td>
                                    <div class="social-media-wrap" style="margin-bottom: 10px;">
                                        <ul>
                                            <li><a href="#" style="width: 35px; height: 35px; padding: 7px;border-radius: 50%; background: #5264AE; margin: 0 7px;"><img style="width: 35px; height: 35px;" src="{{asset('frontend/assets')}}/images/instagram.png" alt="Insta" style="filter: brightness(0) invert(1); position: relative; "></a></li>
                                            <li><a href="#" style="width: 35px; height: 35px; padding: 7px;border-radius: 50%; background: #5264AE; margin: 0 7px;"><img style="width: 35px; height: 35px;" src="{{asset('frontend/assets')}}/images/facebook.png" alt="Facebook" style="filter: brightness(0) invert(1); position: relative; "></a></li>
                                            <li><a href="#" style="width: 35px; height: 35px; padding: 7px;border-radius: 50%; background: #5264AE; margin: 0 7px;"><img style="width: 35px; height: 35px;" src="{{asset('frontend/assets')}}/images/linkedin.png" alt="Twiter" style="filter: brightness(0) invert(1); position: relative; "></a></li>
                                            <li><a href="#" style="width: 35px; height: 35px; padding: 7px;border-radius: 50%; background: #5264AE; margin: 0 7px;"><img style="width: 35px; height: 35px;" src="{{asset('frontend/assets')}}/images/whatsapp.png" alt="Pintrest" style="filter: brightness(0) invert(1); position: relative; "></a></li>
                                        </ul>
                                    </div>
                                </td>
                                <td style="color: #FFFFFF; text-align: center; line-height: 30px; font-weight: 400; font-size: 10px;">© 2023 All Rights Reserved | Vocaal4local's</td>
                            </tr>
                            <tr style="background: #5264AE; padding: 12px 0;">
                                <td style="text-align: center;">
                                    <div style="display: flex;align-items: center; justify-content: center;">
                                        <ul style="list-style: none; list-style-position: inside; display: flex; justify-content: center; gap: 20px;">
                                            <li><a href="#" style="color: #FFFFFF; text-decoration: none; padding-top: 12px; display: block; font-size: 10px;">Privacy Policy</a></li>
                                            <li><a href="#" style="color: #FFFFFF; text-decoration: none; padding-top: 12px; display: block; font-size: 10px;">Terms & Conditions</a></li>
                                            <li><a href="#" style="color: #FFFFFF; text-decoration: none; padding-top: 12px; display: block; font-size: 10px;">www.vocaal4local’s.com</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </section>


</body>
</html>
