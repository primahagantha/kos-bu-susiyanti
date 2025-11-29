import os

root_dir = r"d:\production\lawak"
auth_line = "<?php include_once 'auth_check.php'; ?>"
exclude_files = ["login.php", "koneksi.php", "auth_check.php", "logout.php", "seeder.php", "test_bypass.php", "test_auth_bypass.php", "index.php"]

for filename in os.listdir(root_dir):
    if filename.endswith(".php") and filename not in exclude_files:
        filepath = os.path.join(root_dir, filename)
        with open(filepath, "r", encoding="utf-8") as f:
            content = f.read()
        
        if "auth_check.php" not in content:
            # Check if file starts with <?php
            if content.strip().startswith("<?php"):
                # Insert after <?php
                new_content = content.replace("<?php", "<?php include_once 'auth_check.php';", 1)
            else:
                # Prepend to file
                new_content = auth_line + "\n" + content
            
            with open(filepath, "w", encoding="utf-8") as f:
                f.write(new_content)
            print(f"Secured {filename}")
        else:
            print(f"Already secured {filename}")
