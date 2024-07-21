document.getElementById('contact-form').addEventListener('submit', function(e) {
    e.preventDefault(); 

    var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var message = document.getElementById('message').value;

    var token = '6927456490:AAFanv0L0LyPB8swrDqJ-v71DHh6eTSeBIA';
    var chat_id = '7222383115';
    var text = `New Contact Form Submission:%0AName: ${name}%0AEmail: ${email}%0AMessage: ${message}`;

    var url = `https://api.telegram.org/bot${token}/sendMessage?chat_id=${chat_id}&text=${text}`;

    var xhr = new XMLHttpRequest();
    xhr.open('GET', url, true);

    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                alert('Message sent successfully!');
            } else {
                alert('Error sending message: ' + xhr.statusText);
            }
        }
    };

    xhr.send();
});
