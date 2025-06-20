# Artisan Direct - Local Artisan Marketplace

## 1. Project Overview

Artisan Direct is a web platform designed to connect consumers directly with local food artisans. The goal of this project is to build a Minimum Viable Product (MVP) that validates the core business model, providing a functional, secure, and user-friendly platform for artisans to sell their products and customers to purchase them.

## 2. Core User Roles

The platform supports three primary user roles:

*   **Customer:** Browses, purchases, and reviews products.
*   **Artisan (Vendor):** Lists products, manages their shop, and fulfills orders.
*   **Admin:** Oversees the entire platform.

## 3. Key Features (MVP Scope)

### A. Public & General Features

*   **Homepage:** Landing page featuring artisans, popular products, and calls-to-action.
*   **Artisan Directory:** Searchable and filterable list of approved artisans by location and food category.
*   **Product Listings:** Main page to browse all products with robust filtering (category, price, location, artisan).

### B. Customer Features

*   **Authentication:** Secure registration and login (email/password, Google Socialite option).
*   **Profile:** Basic profile management (name, delivery address).
*   **Product Pages:** Detailed product views with images, description, price, artisan info, and customer reviews.
*   **Shopping Cart:** Standard, persistent shopping cart.
*   **Checkout Process:** Multi-step, secure checkout integrated with Stripe.
*   **Order History:** Dashboard to view past and current order statuses.
*   **Review System:** Ability to leave 1-5 star ratings and text reviews for purchased products.

### C. Artisan (Vendor) Features

*   **Onboarding:** Separate registration process for business details and certifications; requires Admin approval.
*   **Artisan Dashboard:** Central hub for sales statistics, recent orders, and notifications.
*   **Shop Profile Management:** Customization of public-facing shop page (logo, banner, description, location).
*   **Product Management (CRUD):** Create, Read, Update, Delete product listings (name, description, price, photos, inventory).
*   **Order Management:** View incoming orders, update status, and access customer details.

### D. Admin Features

*   **Admin Dashboard:** Overview of platform health (total users, artisans, sales).
*   **User Management:** Ability to view, edit, or suspend Customer and Artisan accounts.
*   **Artisan Approval System:** Queue for pending artisan applications with approval/rejection functionality.
*   **Category Management:** Ability to add, edit, or remove product and artisan categories.

## 4. Technical Stack & Requirements

*   **Backend:** Laravel (latest stable version).
*   **Frontend:** Vue.js with Inertia.js for a SPA-like feel.
*   **Database:** MySQL or PostgreSQL.
*   **Payment Gateway:** Stripe (hard requirement).
*   **Code Standards:** Clean, well-commented, PSR standards-compliant. Managed in a private Git repository.
*   **Testing:** Reasonable level of feature and unit tests.
*   **Deployment:** Deployable to standard cloud servers (e.g., DigitalOcean, Linode). Basic server requirements to be outlined.

## 5. Deliverables & Timeline

*   **Initial Consultation:** Feedback on brief, technical recommendations, and project estimate (time & cost).
*   **Weekly Check-ins:** Brief progress updates.
*   **Final Delivery:**
    *   Full source code in the provided Git repository.
    *   Deployment to a staging server for review and UAT.
    *   Basic documentation for project setup and deployment.
*   **Timeline:** MVP launch within 10-12 weeks.