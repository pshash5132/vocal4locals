
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
                                <td style="text-align: center;"><a href="#"><img src="{{asset('frontend/assets')}}/images/logo.svg" style="max-width: 287px;" alt="Vocalforlocal" /></a></td>
                            </tr>
                        </thead>
                        <tbody style="margin: 50px auto 0 !important; width: 100%; display: block; max-width: 560px; border: 1px solid #374850; border-radius: 10px;padding: 43px 35px;">
                            <tr>
                                <td style="font-size: 24px; font-weight: 600; color: #374850;">Welcome Bill Kenney,</td>
                            </tr>
                            <tr>
                                <td style="font-size: 16px; color: #374850; line-height: 30px; font-weight: 400; margin-top: 15px; display: block;">We pleasure to have you!  joining under <span style="color: #374850; font-weight: 700;">Vocaal4local's</span> our e-commerce plat form. Please click on this link below to complete your registration and enjoy wonderful offers.</td>
                            </tr>
                            <tr>
                                <td style="font-size: 16px; color: #374850;">Follow Link : <a href="{{$url}}" style="color: #2672EC; font-weight: 500; text-decoration: none; line-height: 30px; font-size: 16px;">Verify Email</a> </td>
                            </tr>
                            <tr style="flex-direction: column; display: flex; margin-top: 30px;">
                                <td style="display: flex; align-items: center; font-size: 16px; color: #374850; width: 100%;"><span style="display: block; width: 20%;">Username :</span>  <p style="color: #2672EC; font-weight: 600; line-height: 30px; font-size: 16px; margin-bottom: 0;">{{$user->name}}</p> </td>
                                <td style="display: flex; align-items: center; font-size: 16px; color: #374850; width: 100%;"> <span style="display: block; width: 20%;">Email  : </span>  <p style="color: #2672EC; font-weight: 600; line-height: 30px; font-size: 16px; margin-bottom: 0;">{{$user->email}}</p> </td>
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
                                            <li><a href="#" style="width: 35px; height: 35px; padding: 7px;border-radius: 50%; background: #5264AE; margin: 0 7px;"><img src="{{asset('frontend/assets')}}/images/Insta.svg" alt="Insta" style="filter: brightness(0) invert(1); position: relative; "></a></li>
                                            <li><a href="#" style="width: 35px; height: 35px; padding: 7px;border-radius: 50%; background: #5264AE; margin: 0 7px;"><img src="{{asset('frontend/assets')}}/images/fb.svg" alt="Facebook" style="filter: brightness(0) invert(1); position: relative; "></a></li>
                                            <li><a href="#" style="width: 35px; height: 35px; padding: 7px;border-radius: 50%; background: #5264AE; margin: 0 7px;"><img src="{{asset('frontend/assets')}}/images/Twiter.svg" alt="Twiter" style="filter: brightness(0) invert(1); position: relative; "></a></li>
                                            <li><a href="#" style="width: 35px; height: 35px; padding: 7px;border-radius: 50%; background: #5264AE; margin: 0 7px;"><img src="{{asset('frontend/assets')}}/images/Pintrest.svg" alt="Pintrest" style="filter: brightness(0) invert(1); position: relative; "></a></li>
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
