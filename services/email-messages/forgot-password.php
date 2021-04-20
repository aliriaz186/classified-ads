<?php

namespace services\email_messages;

class ForgotPasswordMessage
{
    public function invitationMessageBody(string $token)
    {
        $emailBody = '
   <body>
   <div style="margin: 0 auto;max-width: 600px;background: rgba(211,211,211,0.68);padding: 30px">


             <div style="margin-left: 10px;margin-right: 10px;font-size: 17px;padding-top: 2px">Please click on the below button to reset your password</div>
             <div style="margin-left: 10px;margin-right: 10px;font-size: 17px;padding-top: 30px;margin-top: 30px"><a href="'. url(''). '/reset-password/'. $token. '" style=" background-color: #1AAA55;
  border: none;
  color: white;
  padding: 10px 27px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 18px;
  cursor: pointer;
  border-radius: 3px;margin-left: 50px">RESET PASSWORD</a></div>

</div>
            </body>
            ';
        return $emailBody;
    }

}
