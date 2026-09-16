<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Device Types
        $devices = ['Laptop', 'PC', 'Monitor', 'Camera', 'Router'];
        foreach ($devices as $device) {
            Type::firstOrCreate([
                'name' => $device,
                'type' => 'device',
            ]);
        }

        // 2. Issue Types (IT Device & Technical Issues)
        $deviceIssues = [
            // General IT Issues
            'Hardware Issues',
            'Software Installation',
            'Network',
            'Email & Communication',
            'Printer & Peripheral Issues',
            'Security & Access',
            'Performance Issues',
            'System Updates & Patching',
            'Cloud & Server Issues',
            'Data Backup & Recovery',
            'User Account Management',
            'Software Bugs & Errors',
            'Mobile Device Issues',
            'Remote Access Issues',
            'Other IT Issues',

            // Specific Device Technical Issues
            'Device Not Powering On',
            'Overheating Issues',
            'Hardware Failure',
            'Screen Flickering',
            'No Display',
            'Battery Not Charging',
            'Camera Not Detected',
            'USB Ports Not Working',
            'Wi-Fi Not Connecting',
            'Blue Screen Error',
            'Slow Performance',
            'System Not Booting',
            'Noise from Device',
            'Hard Disk Not Found',
            'Keyboard/Mouse Not Responding',
        ];

        foreach ($deviceIssues as $issue) {
            Type::firstOrCreate([
                'name' => trim($issue),
                'type' => 'issue',
            ]);
        }

        // 3. Ticket Categories
        $ticketCategories = [
            // Operations
            'Facility Maintenance Request',
            'Logistics & Supply Chain Issues',
            'Procurement & Vendor Issues',
            'Workplace Safety Concerns',
            'Employee Shift & Scheduling',
            'Equipment Malfunction',
            'Inventory Management Issues',
            'Fleet Management Problems',
            'Operational Process Improvement',
            'Other Operations Issues',

            // Sales & Marketing
            'CRM System Issues',
            'Lead Management Problems',
            'Marketing Campaign Errors',
            'Social Media Account Issues',
            'Website or E-commerce Problems',
            'Client Proposal & Quotation Issues',
            'Advertisement Budget & Billing',
            'Product Catalog Updates',
            'Sales Performance Analytics',
            'Other Sales & Marketing Issues',

            // Accounting
            'Payroll Processing Errors',
            'Invoice & Billing Issues',
            'Expense Reimbursement Problems',
            'Tax Filing & Compliance',
            'Bank Reconciliation Issues',
            'Budget & Financial Planning',
            'Vendor Payment Delays',
            'Fraud Detection & Reporting',
            'Financial Software Issues',
            'Other Accounting Issues',
        ];

        foreach ($ticketCategories as $category) {
            Type::firstOrCreate([
                'name' => trim($category),
                'type' => 'ticket',
            ]);
        }
    }
}
