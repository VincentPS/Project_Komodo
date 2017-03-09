    <script>
        window.data = JSON.parse('<?php echo json_encode($application->data) ?>');
        console.log(window.data);
    </script>
</body>
</html>
