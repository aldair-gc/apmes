export default function buildAllPosts(json) {
    let innerHtmlPostsContainer = "";

    json.forEach((x) => {
        innerHtmlPostsContainer += buildPost(x);
        function buildPost(data) {
            return `
            <div class="post ${data.group}">
                <img class="post-media" src=${data.picture}>
                <div class="post-texts">
                    <div class="posts-header">
                        <div class="posts-title">${data.title}</div>
                        <div class="posts-date">${data.date}</div>
                    </div>
                    <div class="posts-content">${data.content}</div>
                </div>
            </div>
            `;
        }
    });
    return innerHtmlPostsContainer;
}
