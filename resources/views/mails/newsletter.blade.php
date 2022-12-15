<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="x-apple-disable-message-reformatting">
        <title></title>
        <!--[if mso]>
        <noscript>
        <xml>
            <o:OfficeDocumentSettings>
            <o:PixelsPerInch>96</o:PixelsPerInch>
            </o:OfficeDocumentSettings>
        </xml>
        </noscript>
        <![endif]-->
        <style>
        table, td, div, h1, p {font-family: Arial, sans-serif;}
        </style>
    </head>
    <body style="margin:0;padding:0;">
        <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;background:#ffffff;">
        <tr>
            <td align="center" style="padding:0;">
            <table role="presentation" style="width:602px;border-collapse:collapse;border:1px solid #cccccc;border-spacing:0;text-align:left;">
                <tr>
                <td align="center" style="padding:40px 0 30px 0;background:#212529;color:#fff;">
                    {{-- <img src="https://assets.codepen.io/210284/h1.png" alt="" width="300" style="height:auto;display:block;" /> --}}
                    <h1><a style="color:#fff;" href="website_url">Example.com</a></h1>
                </td>
                </tr>
                <tr>
                <td style="padding:36px 30px 42px 30px;">
                    <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
                    <tr>
                        <td style="padding:0 0 36px 0;color:#153643;">
                        <h1 style="font-size:24px;margin:0 0 20px 0;font-family:Arial,sans-serif;">Welcome to Example.com Newsletter</h1>
                        <p style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">About</p>
                        <p style="margin:0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;"><a href="website_url" style="color:#ee4c50;text-decoration:underline;">Visit our website</a></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:0;">
                            <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
                                @foreach($posts as $post)
                                    <tr>
                                        <td style="width:260px;padding:0;vertical-align:top;color:#153643;">
                                            <p style="margin:0;font-size:28px;line-height:36px;font-family:Arial,sans-serif;"><a href="website_url/post/{{$post->slug}}" style="text-decoration:underline;">{{strip_tags($post->title)}}</a></p>
                                            <p style="margin:0 0 25px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;"><img src="{{$post->feature_image_url}}" alt="{{strip_tags($post->title)}}" width="100%" style="height:auto;display:block;" /></p>
                                            <p style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;"> {!! substr( strip_tags($post->description, '<br>') ,0,115) !!}... </p>
                                            <p style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;"> {{$post->created_at}} </p>
                                            <hr>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </td>
                    </tr>
                    </table>
                </td>
                </tr>
                <tr>
                <td style="padding:30px;background:#212529;">
                    <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;font-size:9px;font-family:Arial,sans-serif;">
                    <tr>
                        <td style="padding:0;">
                        <p style="margin:0;font-size:14px;line-height:16px;font-family:Arial,sans-serif;color:#ffffff;">
                            &reg; You received this email because you subscribe to our website newsletter! <a href="website_url/unsubscribe?email={{$to}}" style="color:#3e8ed0;text-decoration:underline;">Unsubscribe</a>
                        </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:0;padding-top: 20px;">
                        <table role="presentation" style="border-collapse:collapse;border:0;border-spacing:0;">
                            <tr>
                                
                                        <td style="padding:0 0 0 10px;width:50px;font-size:20px;">
                                            <a target="_blank" href="" style="color:#ffffff;">Facebook</a>
                                        </td>

                                        <td style="padding:0 0 0 10px;width:50px;font-size:20px;">
                                            <a target="_blank" href="" style="color:#ffffff;">Twitter</a>
                                        </td>
                                    
                            </tr>
                        </table>
                        </td>
                    </tr>
                    </table>
                </td>
                </tr>
            </table>
            </td>
        </tr>
        </table>
    </body>
</html>