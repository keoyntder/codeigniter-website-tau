<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Research - TAU Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        :root { --tau-green: #004d25; --tau-gold: #ffcc00; }
        .bg-tau { background-color: var(--tau-green); color: white; }
        .btn-tau { background-color: var(--tau-green); color: white; border: none; }
        .btn-tau:hover { background-color: #003318; color: var(--tau-gold); }
    </style>
</head>
<body class="bg-light">

    <?= view('admin/partials/header') ?>

    <div class="container my-5">
        
        <!-- Flash Messages -->
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <!-- CONDITIONAL CHECK: If $item is set, show the Edit Form -->
        <?php if (isset($item)): ?>
            <div class="card shadow-sm border-0">
                <div class="card-header bg-tau d-flex justify-content-between align-items-center">
                    <h4 class="m-0 py-1">Edit Research Item</h4>
                    <a href="<?= base_url('admin/research') ?>" class="btn btn-sm btn-light">Back to List</a>
                </div>
                <div class="card-body p-4">
                    <form action="<?= base_url('admin/research/update/' . $item['id']) ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field() ?>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Title</label>
                            <input type="text" class="form-control" name="title" value="<?= esc($item['title']) ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Category</label>
                            <input type="text" class="form-control" name="category" value="<?= esc($item['category']) ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Description</label>
                            <textarea class="form-control" name="description" rows="5" required><?= esc($item['description']) ?></textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-semibold">Overlay Badge</label>
                                <input type="text" class="form-control" name="overlay_badge" value="<?= esc($item['overlay_badge']) ?>">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-semibold">Overlay Title</label>
                                <input type="text" class="form-control" name="overlay_title" value="<?= esc($item['overlay_title']) ?>">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-semibold">Overlay Desc</label>
                                <input type="text" class="form-control" name="overlay_desc" value="<?= esc($item['overlay_desc']) ?>">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Research Image</label>
                            <input type="file" class="form-control" name="image">
                            <?php if (!empty($item['image'])): ?>
                                <small class="text-muted mt-1 d-block">Current: <?= esc($item['image']) ?></small>
                            <?php endif; ?>
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <a href="<?= base_url('admin/research') ?>" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-tau px-4">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>

        <!-- OTHERWISE: Show the Table List -->
        <?php else: ?>
            <div class="card shadow-sm border-0">
                <div class="card-header bg-tau d-flex justify-content-between align-items-center">
                    <h4 class="m-0 py-1">Manage Research & Development Content</h4>
                    <a href="<?= base_url('admin/dashboard') ?>" class="btn btn-sm btn-light">Dashboard</a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-dark">
                                <tr>
                                    <th class="ps-4">ID</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th class="text-end pe-4">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($research_items)): ?>
                                    <?php foreach ($research_items as $row): ?>
                                        <tr>
                                            <td class="ps-4"><?= esc($row['id']) ?></td>
                                            <td class="fw-semibold"><?= esc($row['title']) ?></td>
                                            <td><span class="badge bg-secondary"><?= esc($row['category']) ?></span></td>
                                            <td class="text-end pe-4">
                                                <a href="<?= base_url('admin/research/edit/' . $row['id']) ?>" class="btn btn-sm btn-tau">Edit</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="4" class="text-center py-4 text-muted">No research records found.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <?php endif; ?>

    </div>

</body>
</html>