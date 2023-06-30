<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Arunprabha International E-Commerce PVT. LTD.</title>
</head>
<body style="margin:0px; background: #f8f8f8; ">
<div width="100%" style="background: #f8f8f8; padding: 0px 0px; font-family:arial; line-height:28px; height:100%;  width: 100%; color: #514d6a;">
  <div style="max-width: 700px; padding:50px 0;  margin: 0px auto; font-size: 14px">
    <div style="padding: 40px; background: #fff;">
      <table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
        <tbody>
          <tr>
            <td>
                <b>Dear AIECPL, </b><br>
                {{$email->FullName}} contacted you with the following details,
                
                <p>Name: {{$email->FullName}}</p>
                <p>Email: {{$email->EmailID}}</p>
                <p>Phone: {{$email->MobileNo}}</p>
                <p>Message: {{$email->Message}}</p>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div style="text-align: center; font-size: 12px; color: #b2b2b5; margin-top: 20px">
      <p> Powered by 24techsoft.com <br>
    </div>
  </div>
</div>
</body>
</html>