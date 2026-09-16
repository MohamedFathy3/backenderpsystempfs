<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

class BaseController extends Controller
{
    protected mixed $crudRepository;

    public function toggle($id, $column): JsonResponse
    {
        $item = $this->crudRepository->find($id);

        if ($item) {
            $item->$column = !$item->$column;
            $item->save();

            // 👇 الإضافة هنا فقط
            if ($column === 'active' && $item instanceof \App\Models\Country) {
                $item->cities()->update([
                    'active' => $item->active
                ]);
            }

            return response()->json(['message' => 'Status Changed successfully']);
        }

        return response()->json(['Error' => 'Item does not exist'], 404);
    }
    public function nextCode(
        string $column = 'code',
        int $digits = 3
    ): JsonResponse
    {
        $latestCode = $this->crudRepository
            ->getModel()
            ->whereNotNull($column)
            ->orderByDesc('id')
            ->value($column);

        // لو مفيش أى أكواد
        if (!$latestCode) {
            return response()->json([
                'data' => [
                    'code' => str_pad(1, $digits, '0', STR_PAD_LEFT)
                ]
            ]);
        }

        // استخراج الـ Prefix والرقم
        preg_match('/^([A-Za-z]+)(\d+)$/', $latestCode, $matches);

        $prefix = $matches[1] ?? '';
        $number = isset($matches[2]) ? ((int) $matches[2]) + 1 : 1;

        return response()->json([
            'data' => [
                'code' => $prefix . str_pad($number, $digits, '0', STR_PAD_LEFT)
            ]
        ]);
    }
}
