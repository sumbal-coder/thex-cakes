<?php

namespace App\Enums;

enum PermissionEnum: string
{
        // Dashboard
    case VIEW_DASHBOARD = "view dashboard";

        // User Management
    case VIEW_USERS = "view users";
    case ADD_USERS = "create users";
    case EDIT_USERS = "edit users";
    case DELETE_USERS = "delete users";
    case EDIT_USERS_ROLE = "edit users role";

        // Role Management
    case VIEW_ROLES = "view roles";
    case ADD_ROLES = "create roles";
    case EDIT_ROLES = "edit roles";
    case DELETE_ROLES = "delete roles";
    
        // Product Management
    case VIEW_PRODUCTS = "view products";
    case ADD_PRODUCTS = "create products";
    case EDIT_PRODUCTS = "edit products";
    case DELETE_PRODUCTS = "delete products";

        // FAQS Management
    case VIEW_FAQS = "view faqs";
    case ADD_FAQS = "create faqs";
    case EDIT_FAQS = "edit faqs";
    case DELETE_FAQS = "delete faqs";

        // About Us
    case EDIT_ABOUT_US = "edit about us";

        // Address
    case EDIT_ADDRESS = "edit address";

        // Content
    case EDIT_CONTENT = "edit content";
}
