<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gattitus | Sube una foto de tu gato hoy</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,700,800&amp;display=swap" rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'">

    <style>
        body{
            margin: 0px;            
        }
        .header{
            background: linear-gradient(180deg, #f50, #f90 50%);
            margin-top: -1px;
            padding-top: 1px;
        }
        .box-center{
            max-width: 600px;
            margin: auto;
            background-position: 100% 50%;
            padding: 0px 30px;
            text-align: center;
        }
        .fb-connect{
            cursor: pointer;
            border: 0;
            border-radius: 20px;
            background: #1877f2;
            color: #fff;
            font-size: 16px;
            font-weight: 700;
            padding: 8px 15px 8px 20px;
        }
        .fb-connect::before{
            display: inline-block;
            position: relative;
            left: -8px;
            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACQAAAAkCAQAAABLCVATAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAAmJLR0QA/4ePzL8AAAAHdElNRQfjBBYGJDeRLlUUAAABrklEQVRIx62Wv07CUBTGv16KkwRJiNEOuDq4GCcWXSAh0UhiwsbjwMrOE/gEhKSmU4lMxIWRyYEAi4M6FfgcSNOW3nvbIt9ZmtNzfzn337nHIBQq4RF1VGDBAjDHHJ94wwBfinjKrEmHHmXy6LApGxN3VTlikkas6kE59hIhvnrMqUBFDlNjSHLIogxU5DQThiSnASqYVLZsgqxyUZB+bV7Z4jVNnvCMV7zbW6sQqKqBrPgU29moqgFIt+EvklMT1cgHNTWYgfTA7qu5Azka0HMqkEOAJcVl2MkKDb/lO3+lUR5LYFu7X/kQ6EMT1xaoQycv9H2jiasLVJBWpuZfRcBKDdLJMviNU02AESldav2ISGgYsDOZryCLF1hmn4bEtxBYHAW0FJhlBl1KfDMB+ygZ2QbPsVAsOFLvGnEhsIKbOad9uViBYENzh3R3PlDDL2yTf4EmQYV84OZg0Ib34eLfPRjUjb4ipqJuJ4FGNOMP5DgzaBx/IEGwQDcTyGVB1UTk2eE6FWjNTqQMS9uaSSJoktTW+Fajza0UtKXNWrpGy7cyW+xHPH22WFbF/wFjomOSv4zcqgAAACV0RVh0ZGF0ZTpjcmVhdGUAMjAxOS0wNC0yMlQxMzozNjo1NS0wNzowMIuJxNAAAAAldEVYdGRhdGU6bW9kaWZ5ADIwMTktMDQtMjJUMTM6MzY6NTUtMDc6MDD61HxsAAAAAElFTkSuQmCC);
            height: 24px;
            width: 24px;
            background-repeat: no-repeat;
            background-position: 0 0;
            background-size: 24px 24px;
            text-indent: -9999px;
            text-align: center;
            line-height: 23px;
            content: "f";
        }
        .img{
            margin-top: 420px;
            width: 100%;
            z-index: -1;
            display: block;
        }
        @media (min-width: 500px) {
            .img{
                margin-top: 360px;
            }
        }
        @media (min-width: 700px) {
            .img{
                margin-top: 300px;
            }
        }
        @media (min-width: 1000px) {
            .img{
                margin-top: 200px;
            }
        }
        @media (min-width: 1200px) {
            .img{
                margin-top: 100px;
            }
        }
        
    </style>
</head>
<body>    
    <div class="header" style="position: relative;">
        <div style="position: absolute; width: 100%">
            <div class="box-center">
                <br>
                <br>
                <br>
                <h1 style="font-family: 'Nunito'; font-weight: 800; color: #fff; text-align: center; font-size: 40px; line-height: 40px; margin-top:0px;">Gattitus, sube una foto de tu gato hoy</h1>
                <p style="font-family: 'Nunito'; font-weight: 200; color: #fff; text-align: center; font-size: 26px; line-height: 26px; margin-top: 50px;">
                    Un lugar donde los usuarios pueden compartir y descubrir fotos de gatos
                </p>
                
                <a href="{{ route('login.facebook') }}">
                    <button style="margin-top: 30px;" class="fb-connect">Iniciar sesión con Facebook</button>
                </a>
            </div>
        </div>
        <picture>
            <source media="(min-width:1000px)" srcset="{{ asset('assets/imgs/land.png') }}" class="img">
            <source media="(min-width:800px)" srcset="{{ asset('assets/imgs/land-lg.png') }}" class="img">
            <source media="(min-width:600px)" srcset="{{ asset('assets/imgs/land-md.png') }}" class="img">
            <img src="{{ asset('assets/imgs/land-sm.png') }}" class="img">     
        </picture>
    </div>
</body>
</html>