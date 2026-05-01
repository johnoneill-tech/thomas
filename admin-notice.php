<?php

date_default_timezone_set('Canada/Newfoundland');

$notice_file = __DIR__ . '/includes/notice_data.json';
$admin_password = 'change-this-password';

$error = '';
$saved = false;
$cleared = false;

$default_notice = [
    'active' => false,
    'type' => 'info',
    'message' => '',
    'notice_date' => '',
    'updated' => '',
];

if (file_exists($notice_file)) {
    $notice = json_decode(file_get_contents($notice_file), true);

    if (!is_array($notice)) {
        $notice = $default_notice;
    }

    $notice = array_merge($default_notice, $notice);
} else {
    $notice = $default_notice;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (($_POST['admin_key'] ?? '') !== $admin_password) {
        $error = 'Incorrect password.';
    } else {
        $action = $_POST['action'] ?? 'save';

        if ($action === 'clear') {
            $notice = [
                'active' => false,
                'type' => 'info',
                'message' => '',
                'notice_date' => '',
                'updated' => date('Y-m-d H:i:s'),
            ];

            file_put_contents($notice_file, json_encode($notice, JSON_PRETTY_PRINT));
            $cleared = true;
        } else {
            $notice = [
                'active' => isset($_POST['active']),
                'type' => $_POST['type'] ?? 'info',
                'message' => trim($_POST['message'] ?? ''),
                'notice_date' => $_POST['notice_date'] ?? date('Y-m-d'),
                'updated' => date('Y-m-d H:i:s'),
            ];

            file_put_contents($notice_file, json_encode($notice, JSON_PRETTY_PRINT));
            $saved = true;
        }
    }
}

$today = date('Y-m-d');

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/styles.css" rel="stylesheet">

    <title>Update Website Notice</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #111;
            color: #fff;
            padding: 20px;
        }

        .wrap {
            max-width: 600px;
            margin: 0 auto;
            background: #222;
            padding: 20px;
            border-radius: 12px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }

        textarea,
        input,
        select {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            font-size: 16px;
            box-sizing: border-box;
        }

        textarea {
            min-height: 140px;
        }

        button {
            margin-top: 20px;
            width: 100%;
            padding: 14px;
            font-size: 18px;
            cursor: pointer;
            border: 0;
        }

        .save-btn {
            background: #0d6efd;
            color: #fff;
        }

        .clear-btn {
            background: #dc3545;
            color: #fff;
        }

        .success {
            background: #155724;
            padding: 10px;
            margin-bottom: 15px;
        }

        .error {
            background: #721c24;
            padding: 10px;
            margin-bottom: 15px;
        }

        .help {
            color: #bbb;
            font-size: 0.9rem;
            margin-top: 5px;
        }
    </style>
</head>
<body>

<div class="wrap">

    <h1>Update Notice</h1>

    <?php if ($saved): ?>
        <div class="success">Notice saved successfully.</div>
    <?php endif; ?>

    <?php if ($cleared): ?>
        <div class="success">Notice cleared successfully.</div>
    <?php endif; ?>

    <?php if ($error): ?>
        <div class="error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="post" autocomplete="off">

        <div class="form-floating col-12 col-sm-12 my-1 px-1 d-flex flex-row align-items-center justify-content-center">
            <div class="form-check form-check-inline">
                <input type="checkbox" class="btn-check" id="active" autocomplete="off" name="active" <?= !empty($notice['active']) ? 'checked' : '' ?>>
                <label class="btn btn-outline-primary" for="active">Show Notice on Website</label>
            </div>
        </div>

        <label for="notice_date">Notice Date</label>
        <input type="date"
               id="notice_date"
               name="notice_date"
               value="<?= htmlspecialchars($notice['notice_date'] ?: $today) ?>">
        <div class="help">Notice will only show on the website when this date is today.</div>

        <label for="type">Notice Type</label>
        <select name="type" id="type">
            <option value="info" <?= ($notice['type'] ?? '') === 'info' ? 'selected' : '' ?>>Info</option>
            <option value="warning" <?= ($notice['type'] ?? '') === 'warning' ? 'selected' : '' ?>>Warning</option>
            <option value="closed" <?= ($notice['type'] ?? '') === 'closed' ? 'selected' : '' ?>>Closed / Weather</option>
        </select>

        <label for="message">Notice Message</label>
        <textarea name="message" id="message"><?= htmlspecialchars($notice['message'] ?? '') ?></textarea>

        <input type="text" name="fake_user" style="display:none" autocomplete="username">

        <label for="admin_key">Password</label>
        <input type="text" name="admin_key" id="admin_key" autocomplete="off" autocapitalize="off"
               spellcheck="false" class="masked-password" <?= !empty($_REQUEST['admin_key']) ? 'value="' . $_REQUEST['admin_key'] . '"' : '' ?>required>

        <button type="submit" name="action" value="save" class="save-btn">Save Notice</button>

        <button type="submit" name="action" value="clear" class="clear-btn">Clear Notice</button>

    </form>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
