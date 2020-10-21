<?php

if (count($_POST)){
    $book = $_POST['book'];
    $chapter = $_POST['chapter'];
    $verse = $_POST['verse'];
    $content = $_POST['content'];
    $topics = json_decode($_POST['topics']);
    $db = herokuConnect();
    $sql = "INSERT INTO scriptures(book,chapter,verseFrom,content) VALUES ($book, $chapter, $verse, $content)";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    foreach ($topics as $topicId) {
        $sql = "INSERT INTO scripttopics (topic_id, script_id) VALUES ($row[id], $topicId)";
        $stmt = $db->prepare($sql);
        $stmt->execute();
    }
    print "Success!";
}

?>


foeach check numbers
    if SQL select from the topics to get ID if it exists insert this with scripture ID into scripttopics
    else insert this new topic into topics get the row back from success and assign the id to the new insert into scripttopics
    