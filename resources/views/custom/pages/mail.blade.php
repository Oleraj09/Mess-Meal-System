<html>
    <head>
        <style>
            //VARIABLES
            // ## Colors
        
            // ### Primary
        
            $veryDarkBlue: hsl(233, 47%, 7%); //(main background)
            $darkDesaturatedBlue: hsl(244, 38%, 16%); //(card background)
            $softViolet: hsl(277, 64%, 61%); //(accent)
        
            // ### Neutral
        
            $white: hsl(0, 0%, 100%); //(main heading, stats)
            $slightlyTransparentWhite-p: hsla(0, 0%, 100%, 0.75);
            $slightlyTransparentWhite-hd: hsla(0, 0%, 100%, 0.6); //stat headings
        
            // FONT
        
            $font-deca: "Lexend Deca", sans-serif;
            $font-inter: "Inter", sans-serif;
        
            //FONT INTER
            @import url("https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap");
        
            //FONT LEXEND DECA
            @import url("https://fonts.googleapis.com/css2?family=Lexend+Deca&display=swap");
        
            *,
            ::after,
            ::before {
                padding: 0;
                margin: 0;
                box-sizing: border-box;
            }
        
            html {
                font-size: 62.5%;
                box-sizing: border-box;
            }
        
            body {
                background: $veryDarkBlue;
                overflow-x: hidden;
            }
        
            main {
                display: flex;
                justify-content: center;
                align-items: center;
                width: 100vw;
                height: 100vh;
            }
        
            .card {
                width: 32.7rem;
                height: 78rem;
                border-radius: 1rem;
                overflow: hidden;
        
                @media (min-width: 64em) {
                    width: 110.9rem;
                    height: 44.6rem;
                    display: flex;
                }
        
                &__img {
                    width: 32.7rem;
                    height: 24rem;
                    position: relative;
                    order: 2;
        
                    @media (min-width: 64em) {
                        width: 54rem;
                        height: 44.6rem;
                    }
        
                    &__mobile {
                        width: 100%;
        
                        @media (min-width: 64em) {
                            display: none;
                        }
                    }
        
                    &__desktop {
                        display: none;
        
                        @media (min-width: 64em) {
                            display: block;
                        }
                    }
        
                    &::before {
                        content: "";
                        position: absolute;
                        top: 0;
                        right: 0;
                        bottom: 0;
                        left: 0;
                        background-color: rgba($color: $softViolet, $alpha: 1);
                        mix-blend-mode: multiply;
                    }
                }
        
                &__content {
                    padding: 3.7rem 3rem;
                    text-align: center;
                    background-color: $darkDesaturatedBlue;
        
                    @media (min-width: 64em) {
                        padding: 7.5rem 12rem 6.4rem 7rem;
                        text-align: start;
                    }
        
                    >h1 {
                        font-family: $font-inter;
                        font-size: 2.8rem;
                        color: $white;
                        line-height: 1.2;
                        font-weight: 700;
                        margin-bottom: 1.9rem;
        
                        @media (min-width: 64em) {
                            font-size: 3.6rem;
                            margin-bottom: 3rem;
                        }
        
                        >span {
                            color: $softViolet;
                        }
                    }
        
                    >p {
                        font-family: $font-inter;
                        font-size: 1.5rem;
                        font-weight: 400;
                        line-height: 1.6;
                        color: $slightlyTransparentWhite-p;
                        margin-bottom: 4rem;
        
                        @media (min-width: 64em) {
                            margin-bottom: 7rem;
                        }
                    }
                }
        
                &__features {
                    @media (min-width: 64em) {
                        display: grid;
                        grid-template-columns: repeat(3, 1fr);
                        column-gap: 5rem;
                    }
        
                    &__component {
                        &:not(:last-child) {
                            margin-bottom: 2.5rem;
        
                            @media (min-width: 64em) {
                                margin-bottom: 0rem;
                            }
                        }
        
                        >h2 {
                            font-family: $font-inter;
                            font-size: 2.5rem;
                            font-weight: 700;
                            color: $white;
                            margin-bottom: 0.5rem;
                        }
        
                        >p {
                            font-family: $font-deca;
                            font-size: 1.3rem;
                            text-transform: uppercase;
                            color: $slightlyTransparentWhite-hd;
                        }
                    }
                }
            }
        
            .attribution {
                text-align: center;
                font-family: $font-inter;
                font-size: 1.5rem;
                background-color: $veryDarkBlue;
                padding-bottom: 2rem;
                font-weight: 500;
                color: $slightlyTransparentWhite-hd;
        
                a {
                    text-decoration: none;
                    color: $white;
                    transition: color 200ms ease-in-out;
        
                    &:hover {
                        color: $softViolet;
                    }
                }
        
                i {
                    margin-top: 1rem;
                    font-size: 2.5rem;
                    padding-right: 1rem;
                }
            }
        </style>
    </head>

    
    <body>
        <main>
            <!-- CONTAINER -->
            <div class="card">
                <!-- IMAGE -->
                <!-- CONTENT-->
                <div class="card__content">
                    <!-- TITLE -->
                    <h3>Hi, {{ $recipient }}</h3>
                    <h2>{{ $subject }}</h2>
                    <div class="card__img">
                        <img src="https://ecdn.dhakatribune.net/contents/cache/images/1200x630x1xxxxx1x694528/uploads/dten/2022/10/16/kitchen-market-mahmud-hossain-opu-15.jpeg?watermark=media%2F2023%2F05%2F28%2F1280px-Dhaka_Tribune_Logo.svg-1-a9e61c86dded62d74300fef48fee558f.png"
                            alt="Header image" class="card__img__desktop" />
                    </div>
                    <!-- PARAGRAPH -->
                    <p>
                        {{ $messages }}
                    </p>
                    <!-- FEATURES -->
                    <div class="card__features">
                        <div class="card__features__component">
                            <h2>{{date('d')}}</h2><h3>{{date('M')}}</h3><h2>{{date('Y')}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    
        <footer>
            <div class="attribution">
                Developed by MondolOZ
            </div>
        </footer>
    </body>
    
</html>