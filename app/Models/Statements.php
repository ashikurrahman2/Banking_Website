<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statements extends Model
{
    use HasFactory;

    protected $fillable = ['bank_statements','document_name'];

    private static $file, $fileName, $directory, $fileUrl;

    private static function getFileUrl($request)
    {
        self::$file = $request->file('bank_statements');
        if (self::$file) {
            self::$fileName = time() . '_' . self::$file->getClientOriginalName();
            self::$directory = 'uploads/bank-statements/';
            self::$file->move(public_path(self::$directory), self::$fileName);
            return self::$directory . self::$fileName;
        }
        return null;
    }

    public static function newStatement($request)
    {
        $statement = new self();
        $statement->bank_statements = self::getFileUrl($request);
        $statement->document_name = $request->document_name;
        $statement->save();
    }

    public static function updateStatement($request, $statement)
    {
        if ($request->file('bank_statements')) {
            if (file_exists(public_path($statement->bank_statements))) {
                unlink(public_path($statement->bank_statements));
            }
            $statement->bank_statements = self::getFileUrl($request);
        }
        $statement->save();
    }

    public static function deleteStatement($statement)
    {
        // ফাইলের পাথ
        $filePath = public_path($statement->bank_statements); 

        // ফাইলটি যদি বিদ্যমান থাকে এবং এটি একটি ফাইল কিনা তা চেক করা
        if (file_exists($filePath) && is_file($filePath)) {
            $deleted = unlink($filePath);  // ফাইল ডিলিট করার চেষ্টা
            if (!$deleted) {
                return false;  // যদি ডিলিট না হয়
            }
        } else {
            return false;  // যদি ফাইল না পাওয়া যায়
        }

        // ডাটাবেস রেকর্ড ডিলিট করুন
        $statement->delete();
        return true;
    }
    
    
    
    
}
