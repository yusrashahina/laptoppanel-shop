<table style="background: #f5f6fa; font-size: 14px; line-height: 22px; font-weight: 400; color: #8094ae; width: 100%; font-family: 'Roboto', Arial, sans-serif;">
    <tr>
        <td style="padding: 20px;">
            <!-- Email Header -->
            <table style="width: 100%; max-width: 620px; margin: 0 auto; text-align: center; padding-bottom: 20px; font-family: 'Roboto', Arial, sans-serif;">
                <tbody>
                <tr>
                    <td style="text-align: center; padding-bottom: 20px;">
                        <a href="#" style="color: #6576ff; word-break: break-all;"><img src="./images/logo-dark2x.png" alt="logo" style="height: 40px;"></a>
                        <p style="font-size: 13px; color: #6576ff; padding-top: 12px; font-family: 'Roboto', Arial, sans-serif;">Conceptual Base Modern Dashboard Theme</p>
                    </td>
                </tr>
                </tbody>
            </table>
            <!-- Email Body -->
            <table style="width: 96%; max-width: 620px; margin: 0 auto; background: #ffffff; text-align: center; font-family: 'Roboto', Arial, sans-serif;">
                <tbody>
                <tr>
                    <td style="padding: 30px 20px;">
                        <h2 style="font-size: 18px; color: #6576ff; font-weight: 600; margin: 0; line-height: 1.4; font-family: 'Roboto', Arial, sans-serif;">Reset Password</h2>
                    </td>
                </tr>
                <tr>
                    <td style="padding: 10px 20px;">
                        <p style="margin: 0; font-family: 'Roboto', Arial, sans-serif;">Hi {{ $user->name }},</p>
                        <p style="margin: 10px 0; font-family: 'Roboto', Arial, sans-serif;">Click on the link below to reset your password.</p>
                        <a href="{{ $url }}" style="background: #6576ff; border-radius: 4px; color: #ffffff !important; display: inline-block; font-size: 13px; font-weight: 600; line-height: 44px; text-align: center; text-decoration: none; text-transform: uppercase; padding: 0 30px; font-family: 'Roboto', Arial, sans-serif;">RESET PASSWORD</a>
                    </td>
                </tr>
                <tr>
                    <td style="padding: 20px 20px;">
                        <p style="margin: 0; font-family: 'Roboto', Arial, sans-serif;">If you did not make this request, please contact us or ignore this message.</p>
                        <p style="margin: 0; font-size: 13px; line-height: 22px; color: #8094ae; font-family: 'Roboto', Arial, sans-serif;">This is an automatically generated email. Please do not reply to this email. If you face any issues, please contact us at help@yourapp.com</p>
                    </td>
                </tr>
                </tbody>
            </table>
            <!-- Email Footer -->
            <table style="width: 100%; max-width: 620px; margin: 0 auto; text-align: center; padding-top: 20px; font-family: 'Roboto', Arial, sans-serif;">
                <tbody>
                <tr>
                    <td style="text-align: center; padding-top: 20px; font-size: 13px;">
                        <p style="font-size: 13px; font-family: 'Roboto', Arial, sans-serif;">
                            Copyright © {{ now()->year }} {{ config('app.name') }}. All rights reserved. <br>
                            Template Made By <a href="https://themeforest.net/user/softnio/portfolio" style="color: #6576ff; font-family: 'Roboto', Arial, sans-serif;">Softnio</a>.
                        </p>
                        <ul style="list-style: none; padding: 0; display: inline-block;">
                            <li style="display: inline-block; padding: 4px;">
                                <a href="#" style="display: inline-block; height: 30px; width: 30px; border-radius: 50%; background: #ffffff;">
                                    <img src="./images/socials/facebook.png" alt="" style="width: 30px;">
                                </a>
                            </li>
                            <li style="display: inline-block; padding: 4px;">
                                <a href="#" style="display: inline-block; height: 30px; width: 30px; border-radius: 50%; background: #ffffff;">
                                    <img src="./images/socials/twitter.png" alt="" style="width: 30px;">
                                </a>
                            </li>
                            <li style="display: inline-block; padding: 4px;">
                                <a href="#" style="display: inline-block; height: 30px; width: 30px; border-radius: 50%; background: #ffffff;">
                                    <img src="./images/socials/youtube.png" alt="" style="width: 30px;">
                                </a>
                            </li>
                            <li style="display: inline-block; padding: 4px;">
                                <a href="#" style="display: inline-block; height: 30px; width: 30px; border-radius: 50%; background: #ffffff;">
                                    <img src="./images/socials/medium.png" alt="" style="width: 30px;">
                                </a>
                            </li>
                        </ul>
                        <p style="font-size: 12px; padding-top: 20px; font-family: 'Roboto', Arial, sans-serif;">
                            This email was sent to you as a registered member of <a href="https://softnio.com" style="color: #6576ff;">softnio.com</a>.
                            To update your email preferences <a href="#" style="color: #6576ff;">click here</a>.
                        </p>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
</table>
