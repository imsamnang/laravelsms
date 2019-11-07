<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Invoice</title>
  <style>
    html,body {
      padding: 0;
      margin: 0;
      width: 100%;
      background: #fff;
      font-family: Arial, Helvetica, sans-serif;
      font-size: 11pt;
    }

    table {
      width: 700px;
      margin: 0 auto;
      text-align: left;
      border-collapse: collapse;
    }
    
    th { padding-left: 2px;  }
    td { padding: 2px; }

    .aeu{
      text-align: right;
      padding-right: 10px;
      font-family: 'Times New Roman', 'Khmer Os Moul Light';
    }

    .line-top{
      border-left: 1px solid;
      padding-left: 10px;
      font-family: 'Times New Roman', 'Khmer Os Moul Light';
    }

    .verify {
      font-family: 'Times New Roman', 'Khmer Os Moul Light';
    }

    .imageAeu{width: 50px; height: 70px;}
    .th{
      background-color: #fff;
      border: 1px solid;
      text-align: center;
    }

    .line-row{
      background-color: #fff;
      border: 1px solid;
      text-align: center;     
    }

    .container{
      width: 100%;
      margin: 0 auto;
    }

    .khm-os{font-family: 'Times New Roman', Times, serif}
    .divide{width: 100%;margin: 0 auto;}

    hr {
      width: 100%;
      margin-right: 0;
      margin-left: 0;
      padding: 0;
      margin-top: 35px;
      margin-bottom: 20px;
      border: 0 none;
      border-top: 1px dashed #322f32;
      background: none;
      height: 0;
    }

    button{
      margin: 0 auto;
      text-align: center;
      height: 100%;
      width: 100%;
      cursor: pointer;
      font-weight: bold;
    }

    .lenght-limit{max-height: 350px; min-height: 350px;}
    .div-button{
      width: 100%;
      margin-top: 0;
      height: 50px;
      text-align: center;
      margin-bottom: 10px;
      border-bottom: 1px solid;
      background: #ccc;
    }
  </style>
</head>
<body>
  <div class="div-button">
    <button onclick="printContent('divide')">Print</button>
    <div id="divide">
      <div id="container">
        <div class="lenght-limit">
          <table>
            <tr>
              <td style="padding-left: 40px;width: 50px;"><img src="{{ asset('logo/logo.jpg') }}"></td>
              <td class="aeu">
                <b style="font-weight: normal;">សាលារៀនអាមេរិកកាំង</b>
                <b>American School</b>
              </td>
              <td class="line-top">
                <b style="font-weight: normal;">បង្កាន់ដៃ</b>
                <b>RECEIPT</b>
            </tr>
            <tr>
              </td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
</body>
</html>