<!DOCTYPE html>
<html>

<head>

    <title>Certificate</title>

    <style>

        body {
            font-family: sans-serif;
            text-align: center;
            border: 12px solid #4f46e5;
            padding: 80px;
        }

        h1 {
            font-size: 50px;
            color: #4f46e5;
        }

        .name {
            font-size: 40px;
            margin: 30px 0;
            font-weight: bold;
        }

        .content {
            font-size: 24px;
            margin-top: 40px;
            line-height: 1.8;
        }

        .footer {
            margin-top: 80px;
            font-size: 18px;
        }

    </style>

</head>

<body>

    <h1>
        Certificate of Appreciation
    </h1>

    <div class="content">

        This certificate is proudly presented to

        <div class="name">

            {{ $application->user->name }}

        </div>

        for successfully participating in

        <strong>
            {{ $application->opportunity->title }}
        </strong>

        organized through VolunteerConnect.

    </div>

    <div class="footer">

        Date:
        {{ now()->format('d M Y') }}

    </div>

</body>

</html>