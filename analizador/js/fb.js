function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    if (response.status === 'connected') {
        console.log(response);
    } else if (response.status === 'not_authorized') {
        document.getElementById('status').innerHTML = 'Please log ' +
            'into this app.';
    } else {
        document.getElementById('status').innerHTML = 'Please log ' +
            'into Facebook.';
    }
}

function checkLoginState() {
    FB.getLoginStatus(function(response) {
        statusChangeCallback(response);
    });
}

function onLogin(response) {
    if (response.status == 'connected') {
        FB.api('/me?fields=first_name', function(data) {
            var welcomeBlock = document.getElementById('fb-welcome');
            welcomeBlock.innerHTML = 'Hello, ' + data.first_name + '!';
        });
    }
}

window.fbAsyncInit = function() {
    FB.init({
        appId: '543030365833198',
        xfbml: true,
        version: 'v2.2'
    });


    FB.getLoginStatus(function(response) {
        if (response.status == 'connected') {
            onLogin(response);
        } else {
            FB.login(function(response) {
                onLogin(response);
            }, {
                scope: 'user_friends, email,read_stream, publish_stream, manage_friendlists, publish_stream, publish_actions, user_groups, friends_groups'
            });
        }
    });

};
