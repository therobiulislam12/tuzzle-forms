<?php 

namespace TechTuzzle\Forms\Admin;

class Menu{

    public function __construct(){
        add_action('admin_menu', [$this, 'ttz_forms_menu']);
    }


    public function ttz_forms_menu(){

        $parent_url = 'tuzzle_forms';
        $capability = 'manage_options';

        add_menu_page(
            __('Tuzzle Forms', 'tuzzle-forms'),
            __('Tuzzle Forms', 'tuzzle-forms'),
            $capability,
            $parent_url,
            [$this, 'ttz_forms_menu_main'],
            'data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHdpZHRoPSI1MTIiIGhlaWdodD0iNTEyIiB4PSIwIiB5PSIwIiB2aWV3Qm94PSIwIDAgMTAyLjA1IDEwMi4wNSIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNTEyIDUxMiIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgY2xhc3M9IiI+PGc+PGcgZmlsbD0iIzE2MTYxNiI+PHBhdGggZD0iTTc2LjE4IDQzLjc2YTIgMiAwIDAgMC0yIDJ2NDJIMTIuNjl2LTY2SDYzLjhhMiAyIDAgMCAwIDAtNEgxMC42OWEyIDIgMCAwIDAtMiAydjcwYTIgMiAwIDAgMCAyIDJoNjUuNDlhMiAyIDAgMCAwIDItMnYtNDRhMiAyIDAgMCAwLTItMnoiIGZpbGw9IiNmZDU2MzEiIG9wYWNpdHk9IjEiIGRhdGEtb3JpZ2luYWw9IiMxNjE2MTYiPjwvcGF0aD48cGF0aCBkPSJNMjQuNjMgNjguMTNhNi4xMyA2LjEzIDAgMCAwLTYuMTIgNi4xMnYxYTYuMTMgNi4xMyAwIDAgMCA2LjEyIDYuMTJoMTYuNTlhNi4xMyA2LjEzIDAgMCAwIDYuMTItNi4xMnYtMWE2LjEzIDYuMTMgMCAwIDAtNi4xMi02LjEyem0xOC43MSA2LjEydjFhMi4xMiAyLjEyIDAgMCAxLTIuMTIgMi4xMkgyNC42M2EyLjEyIDIuMTIgMCAwIDEtMi4xMi0yLjEydi0xYTIuMTIgMi4xMiAwIDAgMSAyLjEyLTIuMTJoMTYuNTlhMi4xMiAyLjEyIDAgMCAxIDIuMTIgMi4xMnpNNTMgMzMuNzNhMiAyIDAgMSAwIDAtNEgyMC41MWEyIDIgMCAwIDAtMiAydjEwLjFhMiAyIDAgMCAwIDIgMmgyNS4yMmEyIDIgMCAxIDAgMC00SDIyLjUxdi02LjF6TTY4LjM1IDYwLjgydi01LjMzYTIgMiAwIDAgMC00IDB2My4zM0gyMi41MXYtNi4xaDIwLjY1YTIgMiAwIDAgMCAwLTRIMjAuNTFhMiAyIDAgMCAwLTIgMnYxMC4xYTIgMiAwIDAgMCAyIDJoNDUuODRhMiAyIDAgMCAwIDItMnoiIGZpbGw9IiNmZDU2MzEiIG9wYWNpdHk9IjEiIGRhdGEtb3JpZ2luYWw9IiMxNjE2MTYiPjwvcGF0aD48cGF0aCBkPSJtOTIuNzggMTguNzYtNy45Mi03LjkxYTIgMiAwIDAgMC0yLjgyIDBsLTI4IDI4YTIuMTEgMi4xMSAwIDAgMC0uNDcuNzdsLTQuMTQgMTIuMDRhMiAyIDAgMCAwIC40OCAyLjA2IDIgMiAwIDAgMCAxLjQxLjU5IDIuMDYgMi4wNiAwIDAgMCAuNjgtLjExbDEyLTQuMTVhMS45IDEuOSAwIDAgMCAuNzYtLjQ4bDI4LTI4YTIgMiAwIDAgMCAuMDItMi44MXpNNjIuMjkgNDYuNDJsLTcuNzUgMi42NiAyLjY3LTcuNzRMNzcgMjEuNThsNS4wOCA1LjA4em0yMi41OS0yMi41OS01LjA4LTUuMDggMy42NS0zLjY2IDUuMDggNS4wOXoiIGZpbGw9IiNmZDU2MzEiIG9wYWNpdHk9IjEiIGRhdGEtb3JpZ2luYWw9IiMxNjE2MTYiPjwvcGF0aD48L2c+PC9nPjwvc3ZnPg==',
            25
        );

        add_submenu_page( 
            $parent_url,
            __('Forms', 'tuzzle_forms'),
            __('Forms', 'tuzzle_forms'),
            $capability,
            $parent_url,
            [$this, 'ttz_forms_menu_main']
        );
        add_submenu_page( 
            $parent_url,
            __('New Form', 'tuzzle_forms'),
            __('New Form', 'tuzzle_forms'),
            $capability,
            'ttz_add_new_form',
            [$this, 'ttz_forms_add_new_form']
        );

        add_submenu_page( 
            $parent_url,
            __('Entries', 'tuzzle_forms'),
            __('Entries', 'tuzzle_forms'),
            $capability,
            'ttz_all_entries',
            [$this, 'ttz_forms_all_entries']
        );
    }


    /**
     * Main Menu Page
     * 
     * @return void
     */
    public function ttz_forms_menu_main(){
        echo 'hello';
    }
    
    public function ttz_forms_add_new_form(){
        echo 'Add New Form';
    }

    public function ttz_forms_all_entries(){
        echo 'All Entries';
    }

}