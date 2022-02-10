<?php

namespace App\Traits\Models;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

trait GeneralScopes
{
    public function scopeSearch($query, $searchField, $searchQuery)
    {
        if ($searchField && $searchQuery)
        {
            $query->where($searchField, 'like', '%' . $searchQuery . '%');
        }

        return $query;
    }

    public function scopeFilter($query)
    {
        $request = request();
        if (defined('self::FILTER'))
        {
            foreach ($request->all() as $field => $value)
            {
                if (key_exists($field, self::FILTER) && !empty($value))
                {
                    $rule = self::FILTER[$field];
                    if (isset($rule['relation']))
                    {
                        $query->whereHas($rule['relation'], function ($query) use ($field, $value) {
                            self::typeWhere($query, $field, $value); // не дает здесь обратиться в scope, поэтмоу через статику
                        });
                    }
                    else
                    {
                        self::typeWhere($query, $field, $value);
                    }
                }
            }
        }

        if ($request->trashed)
        {
            $query->onlyTrashed();
        }

        return $query;
    }

    public function scopeSort($query, $sortBy = null, $sortDesc = null)
    {
        $sortDesc = $sortDesc && $sortBy ? $sortDesc : 'desc';
        $sortBy = $sortBy ?: 'id';

        return $query->orderBy($sortBy, $sortDesc);
    }

    public static function typeWhere($query, $field, $value)
    {
        if (defined('self::FILTER') && key_exists($field, self::FILTER))
        {
            $rule = self::FILTER[$field];
            $condition = $rule['condition'] ?? '=';
            $condition_param = $rule['condition_param'] ?? '';

            switch ($rule['type'])
            {
                case 'where':
                    $query->where($rule['field'], $condition, $condition_param . $value . $condition_param);
                    break;
                case 'whereNull':
                    $query->whereNull($rule['field']);
                    break;
                case 'whereNotNull':
                    $query->whereNotNull($rule['field']);
                    break;
                case 'dateWhere':
                    $query->whereBetween($rule['field'], [
                        Carbon::parse($value)->format('Y-m-d 00-00-00'),
                        Carbon::parse($value)->format('Y-m-d 23-59-59'),
                    ]);
                    break;
                case 'dateSince':
                    $query->where($rule['field'], '>=', Carbon::parse($value)->format('Y-m-d 00-00-00'));
                    break;
                case 'dateUntil':
                    $query->where($rule['field'], '<=', Carbon::parse($value)->format('Y-m-d 23-59-59'));
                    break;
            }
        }
    }
}
