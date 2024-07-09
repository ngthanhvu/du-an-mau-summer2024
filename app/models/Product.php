<?php
include_once __DIR__ . '/../../includes/database.php';
class Product
{
    protected $db;

    public function __construct()
    {
        try {
            $this->db = db_connect();
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function getProduct()
    {
        $sql = "SELECT * FROM products";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function getProductId($id)
    {
        $sql = "SELECT * FROM products WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
    }

    public function addProduct($data)
    {
        $errors = [];
        $uploadedFile = [];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (empty($data['name'])) {
                $errors['name'] = "Tên sản phẩm không được để trống";
            }

            if (empty($data['price'])) {
                $errors['price'] = "Giá sản phẩm không được để trống";
            }

            if (empty($data['quantity'])) {
                $errors['quantity'] = "Số lượng sản phẩm không được để trống";
            }

            if (empty($data['description'])) {
                $errors['description'] = "Mô tả sản phẩm không được để trống";
            }

            if (empty($data['category_id'])) {
                $errors['category_id'] = "Danh mục sản phẩm không được để trống";
            }

            if (empty($_FILES['image']['name'][0])) {
                $errors['image'] = "Hình ảnh sản phẩm không được để trống";
            } else {
                $target_dir = "uploads/";
                $file_count = count($_FILES['image']['name']);

                for ($i = 0; $i < $file_count; $i++) {

                    $file_name = pathinfo($_FILES['image']['name'][$i], PATHINFO_FILENAME);
                    $imageFileType = strtolower(pathinfo($_FILES['image']['name'][$i], PATHINFO_EXTENSION));
                    $unique_file_name = $file_name . '_' . time() . '_' . uniqid() . '.' . $imageFileType;
                    $target_file = $target_dir . $unique_file_name;

                    $check = getimagesize($_FILES['image']['tmp_name'][$i]);

                    if ($check === false) {
                        $errors['image'] = "Hình ảnh không đúng định dạng";
                        continue;
                    }

                    if ($_FILES['image']['size'][$i] > 500000) {
                        $errors['image'] = "Hình ảnh vượt quá kích thước cho phép";
                        continue;
                    }

                    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                        $errors['image'] = "Chỉ chấp nhận file JPG, JPEG, PNG hoặc GIF";
                        continue;
                    }

                    if (empty($errors)) {
                        if (!move_uploaded_file($_FILES['image']['tmp_name'][$i], $target_file)) {
                            $errors['image'] = "Không thể upload hình ảnh";
                        } else {
                            $uploadedFile[] = $unique_file_name;
                        }
                    }
                }
            }

            if (empty($errors)) {
                try {
                    $sql = "INSERT INTO products (name, price, quantity, description, image, category_id) VALUES (?, ?, ?, ?, ?, ?)";
                    $stmt = $this->db->prepare($sql);
                    $stmt->execute([
                        $data['name'],
                        $data['price'],
                        $data['quantity'],
                        $data['description'],
                        implode(',', $uploadedFile),
                        $data['category_id'],
                    ]);
                    return ['success' => true];
                } catch (PDOException $e) {
                    $errors['db'] = "Lỗi khi thêm sản phẩm: " . $e->getMessage();
                }
            }

            return ['success' => false, 'errors' => $errors, 'data' => $data];
        }
    }
    public function deleteProduct($id)
    {
        $sql = "DELETE FROM products WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function updateProduct($id, $data)
    {
        $errors = [];
        $uploadedFile = [];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (empty($data['name'])) {
                $errors['name'] = "Tên sản phẩm không được để trống";
            }

            if (empty($data['price'])) {
                $errors['price'] = "Giá sản phẩm không được để trống";
            }

            if (empty($data['quantity'])) {
                $errors['quantity'] = "Số lượng sản phẩm không được để trống";
            }

            if (empty($data['description'])) {
                $errors['description'] = "Mô tả sản phẩm không được để trống";
            }

            if (!empty($_FILES['image']['name'][0])) {
                $target_dir = "uploads/";
                $file_count = count($_FILES['image']['name']);

                for ($i = 0; $i < $file_count; $i++) {
                    $file_name = pathinfo($_FILES['image']['name'][$i], PATHINFO_FILENAME);
                    $imageFileType = strtolower(pathinfo($_FILES['image']['name'][$i], PATHINFO_EXTENSION));
                    $unique_file_name = $file_name . '_' . time() . '_' . uniqid() . '.' . $imageFileType;
                    $target_file = $target_dir . $unique_file_name;

                    $check = getimagesize($_FILES['image']['tmp_name'][$i]);

                    if ($check === false) {
                        $errors['image'] = "Hình ảnh không đúng định dạng";
                        continue;
                    }

                    if ($_FILES['image']['size'][$i] > 500000) {
                        $errors['image'] = "Hình ảnh vượt quá kích thước cho phép";
                        continue;
                    }

                    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                        $errors['image'] = "Chỉ chấp nhận file JPG, JPEG, PNG hoặc GIF";
                        continue;
                    }

                    if (empty($errors)) {
                        if (!move_uploaded_file($_FILES['image']['tmp_name'][$i], $target_file)) {
                            $errors['image'] = "Không thể upload hình ảnh";
                        } else {
                            $uploadedFile[] = $unique_file_name;
                        }
                    }
                }
            }

            if (empty($errors)) {
                try {
                    $imagePath = !empty($uploadedFile) ? implode(',', $uploadedFile) : $data['old_image'];

                    $sql = "UPDATE products SET name = ?, price = ?, quantity = ?, description = ?, image = ? WHERE id = ?";
                    $stmt = $this->db->prepare($sql);
                    $stmt->execute([
                        $data['name'],
                        $data['price'],
                        $data['quantity'],
                        $data['description'],
                        $imagePath,
                        $id
                    ]);
                    return ['success' => true];
                } catch (PDOException $e) {
                    $errors['db'] = "Lỗi khi cập nhật sản phẩm: " . $e->getMessage();
                }
            }

            return ['success' => false, 'errors' => $errors, 'data' => $data];
        }
    }
}
