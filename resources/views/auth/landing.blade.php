<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Starbuck | Home</title>
</head>
<style>
    @import url("http://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap");

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Cambria, Cochin, Georgia, Times, "Times New Roman", serif;
    }

    @media screen and (max-width: 768px) {
        /* aturan CSS untuk layar dengan lebar maksimum 768px */
    }

    section {
        position: relative;
        width: 100%;
        min-height: 100vh;
        padding: 100px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: #fff;
    }

    header {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        padding: 20px 100px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    header .logo {
        position: relative;
        max-width: 80px;
    }

    header ul {
        position: relative;
        display: flex;
    }

    header ul li {
        list-style: none;
    }

    header ul li a {
        display: inline-block;
        color: #333;
        font-weight: 400;
        margin-left: 40px;
        text-decoration: none;
    }

    .content {
        position: relative;
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .content .textbox {
        position: relative;
        max-width: 600px;
    }

    .content .textbox h2 {
        color: #333;
        font-size: 4em;
        line-height: 1.4em;
        font-weight: 500;
    }

    .content .textbox h2 span {
        color: #017143;
        font-size: 1.2em;
        font-weight: 900;
    }

    .content .textbox p {
        color: #333;
    }

    .content .textbox a {
        display: inline-block;
        margin-top: 20px;
        padding: 8px 20px;
        background: #017143;
        color: #fff;
        border-radius: 40px;
        font-weight: 500;
        letter-spacing: 1px;
        text-decoration: none;
    }

    .content .imgBox {
        width: 600px;
        display: flex;
        justify-content: flex-end;
        padding-right: 50px;
        margin-top: 50px;
    }

    .content .imgBox img {
        max-width: 340px;
    }

    .thumb {
        position: absolute;
        left: 50%;
        bottom: 20px;
        transform: translateX(-50%);
        display: flex;
    }

    .thumb li {
        list-style: none;
        display: inline-block;
        margin: 0 20px;
        cursor: pointer;
        transition: 0.5s;
    }

    .thumb li:hover {
        transform: translateY(-15px);
    }

    .thumb li img {
        max-width: 60px;
    }

    .sci {
        position: absolute;
        top: 50%;
        right: 30px;
        transform: translateY(-50%);
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    .sci li {
        list-style: none;
    }

    .sci li a {
        display: inline-block;
        margin: 5px 0;
        transform: scale(0.6);
        filter: invert(1);
    }

    .circle {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: #017143;
        clip-path: circle(600px at right 700px);
    }
</style>

<body>
    <section>
        <div class="circle"></div>
        <header>
            <a href="#"><img src="{{ asset('assets/image/logo.png') }}" class="logo" alt="kopi" /></a>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Menu</a></li>
                <li><a href="#">What's New</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="/login">Log in</a></li>
            </ul>
        </header>
        <div class="content">
            <div class="textbox">
                <h2>It's not just coffe<br />It's<span id="text"> Starbuck</span></h2>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Necessitatibus, vel voluptatem placeat aliquid fugit maiores
                    nesciunt ullam sequi dolor eligendi aperiam ut fuga magnam beatae in
                    exercitationem. Qui, obcaecati necessitatibus.
                </p>
                <a href="#" id="buton">Learn More</a>
            </div>
            <div class="imgBox">
                <img src="{{ asset('assets/image/img1.png') }}" class="starbucks" />
            </div>
        </div>
        <ul class="thumb">
            <li>
                <img src="{{ asset('assets/image/thumb1.png') }}"
                    onmouseover="imgSlider('assets/image/img1.png');change('#017143');text('#017143');butom('#017143')" />
            </li>
            <li>
                <img src="{{ asset('assets/image/thumb2.png') }}"
                    onmouseover="imgSlider('assets/image/img2.png');change('#eb7495');text('#eb7495');butom('#eb7495')" />
            </li>
            <li>
                <img src="{{ asset('assets/image/thumb3.png') }}"
                    onmouseover="imgSlider('assets/image/img3.png');change('#d752b1');text('#d752b1');butom('#d752b1')" />
            </li>
        </ul>
        <ul class="sci">
            <li>
                <a href=""><img src="{{ asset('assets/image/facebook.png') }}" /></a>
            </li>
            <li>
                <a href=""><img src="{{ asset('assets/image/instagram.png') }}" /></a>
            </li>
            <li>
                <a href=""><img src="{{ asset('assets/image/twitter.png') }}" /></a>
            </li>
        </ul>
    </section>
    <script>
        function imgSlider(baca) {
            document.querySelector(".starbucks").src = baca;
        }

        function change(warna) {
            const circle = document.querySelector(".circle");
            circle.style.background = warna;
        }

        function text(col) {
            const text = document.getElementById("text");
            text.style.color = col;
        }

        function butom(wal) {
            const btn = document.getElementById("buton");
            btn.style.background = wal;
        }
    </script>
</body>

</html>
