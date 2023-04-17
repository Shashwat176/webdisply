<?php
    // Get the uploaded file
    $file = $_FILES['file'];

    // Get the file contents
    $fileContents = file_get_contents($file['tmp_name']);

    // Set up GitHub repository details
    $repoOwner = 'Shashwat176';
    $repoName = 'webdisply';
    $filePath = 'webdisply/datauploaded/files/' . $file['name'];
    $accessToken = 'your_github_access_token'; // Requires appropriate access token with write permissions

    // Create the file on GitHub using GitHub API
    $url = 'https://api.github.com/repos/' . $repoOwner . '/' . $repoName . '/contents/' . $filePath;
    $data = array(
        'message' => 'Upload file: ' . $file['name'],
        'content' => base64_encode($fileContents)
    );
    $options = array(
        'http' => array(
            'header' => "Content-type: application/json\r\n" .
                        "Authorization: token " . $accessToken . "\r\n",
            'method' => 'PUT',
            'content' => json_encode($data)
        )
    );
    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    if ($result === FALSE) {
        die('Error uploading file to GitHub');
    } else {
        echo 'File uploaded successfully to GitHub!';
    }
?>
