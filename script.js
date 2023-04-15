let pages = [];

// Function to create a new page
function createPage(title, content) {
    let page = {
        id: Date.now().toString(),
        title: title,
        content: content,
        url: ""
    };
    pages.push(page);
    return page;
}

// Function to display pages in the index
function displayPageIndex() {
    let pageIndex = document.getElementById("pageIndex");
    pageIndex.innerHTML = "";
    pages.forEach(function(page) {
        let li = document.createElement("li");
        let a = document.createElement("a");
        a.textContent = page.title;
        a.href = page.url;
        li.appendChild(a);
        pageIndex.appendChild(li);
    });
}

// Function to update page URL
function updatePageUrl(page) {
    page.url = "page.html?pageId=" + page.id;
}

// Add event listener for form submit
document.getElementById("pageForm").addEventListener("submit", function(event) {
    event.preventDefault();
    let pageTitle = document.getElementById("pageTitle").value;
    let pageContent = document.getElementById("pageContent").value;
    let page = createPage(pageTitle, pageContent);
    updatePageUrl(page);
    displayPageIndex();
    document.getElementById("pageTitle").value = "";
    document.getElementById("pageContent").value = "";
});
