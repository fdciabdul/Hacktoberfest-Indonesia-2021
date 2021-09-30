let token = await document.getElementById("app").__vue__.$recaptcha("pop")
let delta = 3e4;
let okSend = 0

let send = () => fetch(`https://stats.popcat.click/pop?pop_count=800&captcha_token=${token}`)
    .then((response) => response.json())
    .then((json) => {
        token = json.Token;
        delta > 3e4 && (delta -= 1e3);
        frontEnd()
        loop();
        let cookie = `; ${document.cookie}`.split("; pop_count=")
        document.cookie = `pop_count=${(cookie.length > 1 && (parseInt(cookie[1]) + 800)) || 0}`;
        console.clear();
        console.log(`%cadd 800 click; sends: ${++okSend}`, "color:yellow;background-color:sienna");
    })
    .catch((err) => {
        delta += 1e3;
        loop();
        console.clear();
        console.log("%c429:%c add time", "color:red", "color:black");
    });
let loop = () => setTimeout(send, delta);
send();
function frontEnd() {
    for (let i = 0; i <= 800; i++) {
        setTimeout(() => {
            let txt = document.getElementsByClassName("counter")[0]
            let now = parseInt(txt.innerText.replace(/,/g, "")) || 0
            txt.innerText = (++now).toLocaleString("en-us")
        }, i * (delta / 800));
    }
}
