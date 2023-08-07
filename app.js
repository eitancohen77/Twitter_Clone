let tweetContainer = document.getElementById('tweetsContainer')

function createTweetElement(tweet) {
    const tweetElement = document.createElement("div")
    tweetElement.className = "tweet"
    tweetElement.innerText = tweet
    return tweetElement
}

const tweetForm = document.getElementById("tweetForm")
tweetForm.addEventListener("submit", function(event) {
    event.preventDefault()
    const tweetContent = document.getElementById("tweetContent").value;
    const newTweetElement = createTweetElement(tweetContent);
    const tweetsContainer = document.getElementById("tweetsContainer");
    tweetsContainer.append(newTweetElement);
})