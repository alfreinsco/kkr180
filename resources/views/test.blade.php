<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Hello World</title>
    <style>
        /* Reset dasar */
        body,
        html {
            margin: 0;
            padding: 0;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }

        /* Container utama */
        .device-container {
            transition: all 0.3s ease;
        }

        /* TAMPILAN DESKTOP (Default) — bingkai potret 720 × 1612 px */
        @media (min-width: 769px) {
            .device-container {
                width: min(720px,
                        calc(100vw - 40px),
                        calc((100vh - 40px) * 720 / 1612));
                aspect-ratio: 720 / 1612;
                height: auto;
                min-height: 0;
                background: #333;
                border: 16px solid #222;
                border-radius: 48px;
                display: flex;
                justify-content: center;
                align-items: center;
                position: relative;
                box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
            }

            .device-container::before {
                content: "";
                position: absolute;
                top: 14px;
                bottom: 14px;
                left: 14px;
                right: 14px;
                background: white;
                border-radius: 36px;
                z-index: 0;
            }

            h1 {
                position: relative;
                z-index: 1;
                font-size: clamp(1.25rem, 2.5vw, 2rem);
                color: #333;
            }
        }

        /* TAMPILAN MOBILE */
        @media (max-width: 768px) {
            .device-container {
                /* Menghilangkan bingkai dan latar belakang HP */
                background: none;
                border: none;
                box-shadow: none;
                width: auto;
                height: auto;
            }

            h1 {
                font-size: 3rem;
                color: #000;
            }
        }
    </style>
</head>

<body>

    <div class="device-container">
        <h1>Hello World</h1>
    </div>

</body>

</html>
