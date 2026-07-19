<?php
namespace App\Policies;

use App\Models\Product;
use App\Models\User;

class ProductPolicy
{
    // Fungsi pembuka: Jika Administrator, loloskan semua tanpa cek fungsi lain
    public function before(User $user, string $ability): ?bool
    {
        if ($user->hasRole('Administrator')) {
            return true;
        }
        return null; // Lanjutkan ke pengecekan fungsi di bawah
    }

    // Tampil di navigasi & tabel list
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('view_master_data') || $user->hasRole('Viewer');
    }

    public function view(User $user, Product $product): bool
    {
        return $user->hasPermissionTo('view_master_data') || $user->hasRole('Viewer');
    }

    public function create(User $user): bool
    {
        return $user->hasPermissionTo('manage_master_data');
    }

    public function update(User $user, Product $product): bool
    {
        return $user->hasPermissionTo('manage_master_data');
    }

    public function delete(User $user, Product $product): bool
    {
        return $user->hasPermissionTo('manage_master_data');
    }
}