<?php
$sem_key = ftok(__FILE__, 'S');
$sem_id = sem_get($sem_key, 1);

if (sem_acquire($sem_id)) {
    $counter = (int)file_get_contents('counter.txt');
    $counter++;
    file_put_contents('counter.txt', $counter);
    sem_release($sem_id);
    echo "Counter updated: $counter\n";
} else {
    echo "Failed to acquire semaphore\n";
}
?>
