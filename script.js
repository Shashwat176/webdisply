// Define the pages array to store page data
var pages = [];

// Function to add a new page to the pages array
function addPage(title, content, imageUrl, videoUrl, pdfUrl) {
    var id = Math.random().toString(36).substring(2, 15); // Generate a random id
    var page = {
        id: id,
        title: title,
        content: content,
        imageUrl: imageUrl,
        videoUrl: videoUrl,
        pdfUrl: pdfUrl
    };
    pages.push(page);
    updatePageList();
}

// Function to update the page list in the navigation
function updatePageList() {
    var pageList = document.getElementById("pageList");
    pageList.innerHTML = "";
    pages.forEach(function(page) {
        var li = document.createElement("li");
        var a = document.createElement("a");
        a.href = "page.html?pageId=" + page.id;
        a.textContent = page.title;
        li.appendChild(a);
        pageList.appendChild(li);
    });
}

// Call the function to update the page list on page load
updatePageList();
