<style>
    @import url('https://fonts.googleapis.com/css?family=Abel');

    html,
    body {
        background: #FCEEB5;
        font-family: Abel, Arial, Verdana, sans-serif;
    }

    .center {
        position: absolute;

        top: 50%;
        left: 50%;
        -webkit-transform: translate(-50%, -50%);
    }

    .card {
        width: 450px;
        height: 250px;
        box-shadow: 0 8px 16px -8px rgba(0, 0, 0, 0.4);
        border-radius: 6px;
        overflow: hidden;
        position: relative;
        margin: 1.5rem;
    }

    .layer {
        background-color: rgba(0, 0, 0, 0.8);
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;

    }

    .card h1 {
        text-align: left;
    }

    .card .additional {
        position: relative;
        width: 150px;
        height: 100%;
        background-image: url(profile7.jpg);
        background-position: center;
        transition: width 0.4s;
        overflow: hidden;
        z-index: 2;
    }



    .card:hover .additional {
        width: 100%;
        border-radius: 0 5px 5px 0;
    }

    .card .additional .user-card {
        width: 150px;
        height: 100%;
        position: absolute;
    }

    .card .additional .user-card::after {
        content: "";
        display: block;
        position: absolute;
        top: 10%;
        right: -2px;
        height: 80%;
        border-left: 2px solid rgba(0, 0, 0, 0.025);
    }

    .card .additional .user-card .level,
    .card .additional .user-card .points {
        top: 15%;
        color: blue;
        text-transform: uppercase;
        font-size: 0.75em;
        font-weight: bold;
        background: rgba(0, 0, 0, 0.15);
        padding: 0.125rem 0.75rem;
        border-radius: 100px;
        white-space: nowrap;
    }

    .card .additional .user-card .points {
        top: 85%;
    }

    .card .additional .user-card svg {
        top: 50%;
    }

    .card .additional .more-info {
        width: 300px;
        float: left;
        position: absolute;
        left: 150px;
        height: 100%;
    }

    .card .additional .more-info h1 {
        color: #fff;
        margin-bottom: 0;
        margin-left:14px;
    }


    .card .additional .coords {
        margin-right:20px;
        color: #fff;
        font-size: 1rem;
        /* text-align:center; */
    }

    .card .additional .coords span+span {
        float: right;
    }

    .card .additional .stats {
        font-size: 2rem;
        display: flex;
        position: absolute;
        bottom: 1rem;
        left: 1rem;
        right: 1rem;
        top: auto;
        color: #fff;
    }

    .card .additional .stats>div {
        flex: 1;
        text-align: center;
    }

    .card .additional .stats i {
        display: block;
    }

    .card .additional .stats div.title {
        font-size: 0.75rem;
        font-weight: bold;
        text-transform: uppercase;
    }

    .card .additional .stats div.value {
        font-size: 1.5rem;
        font-weight: bold;
        line-height: 1.5rem;
    }

    .card .additional .stats div.value.infinity {
        font-size: 2.5rem;
    }

    .card .general {
        width: 300px;
        height: 100%;
        position: absolute;
        top: 0;
        right: 0;
        z-index: 1;
        box-sizing: border-box;
        padding: 1rem;
        padding-top: 0;
    }

    .card .general .more {
        position: absolute;
        bottom: 1rem;
        right: 1rem;
        font-size: 0.9em;
    }
</style>

<div class="center">

    <div class="card">
        <div class="additional">
            <div class="layer">
                <div class="user-card">
                    <img class="center" src="ciwi.jpg" style="border-radius:50%; width :100px; height:100px;">
                </div>
                <div class="more-info">
                    <h1>Jane Doe</h1>
                    <div class="coords">
                        <span>Group Name</span>
                        <span>Joined January 2019</span>
                    </div>
                    <div class="coords">
                        <span>Position/Role</span>
                        <span>City, Country</span>
                    </div>
                    <div class="stats">
                        <div>
                            <div class="title">Awards</div>
                            <i class="fa fa-trophy"></i>
                            <div class="value">2</div>
                        </div>
                        <div>
                            <div class="title">Matches</div>
                            <i class="fa fa-gamepad"></i>
                            <div class="value">27</div>
                        </div>
                        <div>
                            <div class="title">Pals</div>
                            <i class="fa fa-group"></i>
                            <div class="value">123</div>
                        </div>
                        <div>
                            <div class="title">Coffee</div>
                            <i class="fa fa-coffee"></i>
                            <div class="value infinity">∞</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="general">
            <h1>Jane Doe</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce a volutpat mauris, at molestie lacus. Nam vestibulum sodales odio ut pulvinar.</p>
            <span class="more">Mouse over the card for more info</span>
        </div>
    </div>

</div>