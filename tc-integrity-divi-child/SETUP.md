# T&C Integrity & Reliable — Divi Child Theme

Custom Divi child theme for **T&C Integrity & Reliable Trash Services**, specializing in **Eviction Junk Removal and Deep Cleaning Services**.

---

## Installation

1. **Prerequisites:** Ensure the [Divi Theme](https://www.elegantthemes.com/gallery/divi/) (parent) is installed and activated on your WordPress site.

2. **Upload the child theme:**
   - Zip the `tc-integrity-divi-child` folder
   - Go to **Appearance > Themes > Add New > Upload Theme**
   - Upload the zip file and click **Install Now**
   - Click **Activate**

3. **Upload the logo:**
   - Place `tc-logo.png` in the `assets/images/` folder (or upload via **Divi > Theme Options > General > Logo**)

---

## Theme Configuration

### Divi Theme Options

Apply the settings from `divi-theme-options.json`:

1. **Divi > Theme Options > General** — Upload logo, set color palette
2. **Divi > Theme Customizer > Header & Navigation** — Apply nav settings
3. **Divi > Theme Customizer > General Settings > Typography** — Set Montserrat (headings) + Open Sans (body)
4. **Divi > Theme Customizer > Buttons** — Set green rounded button style
5. **Divi > Theme Customizer > Footer** — Set dark green footer

### Color Palette

| Color | Hex | Usage |
|-------|-----|-------|
| Primary Dark Green | `#1B5E20` | Headers, footer, dark backgrounds |
| Primary Green | `#2E7D32` | Buttons, links, accents |
| Accent Green | `#4CAF50` | CTAs, hover states, highlights |
| Light Green | `#81C784` | Subtle accents, footer links |
| Pale Green | `#E8F5E9` | Light backgrounds, badges |
| Gold | `#C9A84C` | Premium accents, stars, badges |
| Dark Text | `#1a2e1a` | Headings |
| Body Text | `#333333` | Paragraph text |
| Light Background | `#f5f9f3` | Alternating sections |

---

## Page Setup

### Required Pages

Create the following pages using the **Divi Builder** and reference the layout JSON files in `layouts/`:

| Page | Template File | Description |
|------|--------------|-------------|
| **Home** | `homepage-layout.json` | Hero, services grid, process steps, stats, testimonials, CTA |
| **Services** | `services-layout.json` | All service details with before/after sections |
| **About** | `about-layout.json` | Company story, values, trust factors |
| **Contact** | `contact-layout.json` | Contact form, info, FAQ accordion |

### Building Pages from Layouts

The JSON files in `layouts/` are **content blueprints** — they describe the section structure, module types, and content for each page. To build them:

1. Create a new page in WordPress
2. Enable the **Divi Builder**
3. Follow the section-by-section structure in the JSON file
4. Add the specified Divi modules with the provided content
5. Apply the CSS classes noted in each section

### Navigation Menu Structure

Set up the primary menu (**Appearance > Menus**):

```
Home
Services
  ├── Eviction Junk Removal
  ├── Deep Cleaning
  ├── Furniture & Appliance Removal
  ├── Property Cleanout
  └── Debris & Yard Cleanup
About
Contact
```

---

## Custom Features

### Custom Post Types

- **Services** (`tc_service`) — Manage services with featured images, descriptions, and service areas
- **Testimonials** (`tc_testimonial`) — Client reviews displayed on the homepage and service pages

### Taxonomy

- **Service Areas** — Categorize services by geographic area

### Shortcodes

```php
// Phone number CTA button
[tc_phone number="(555) 123-4567"]
[tc_phone number="(555) 123-4567" text="Call for Free Estimate"]

// Quote/estimate CTA button
[tc_quote_cta]
[tc_quote_cta text="Book Now" url="/contact/" style="gold"]
```

### CSS Classes for Divi Builder

Use these classes in Divi module settings (Advanced > CSS Class):

| Class | Effect |
|-------|--------|
| `tc-hero-section` | Full hero with green gradient overlay |
| `tc-cta-banner` | Green gradient CTA section |
| `tc-section-title` | Centered heading with green underline |
| `tc-check-list` | Green checkmark bullet list |
| `tc-animate` | Fade-in-up on scroll |
| `tc-process-steps` | Numbered steps with counter circles |
| `tc-stats-bar` | Green gradient stat counter section |
| `tc-service-card` | Hoverable service card |
| `tc-testimonial-card` | Styled quote card with stars |

---

## File Structure

```
tc-integrity-divi-child/
├── style.css                    # Child theme header
├── functions.php                # Theme functions, CPTs, shortcodes
├── assets/
│   ├── css/
│   │   ├── custom-styles.css    # All custom brand styles
│   │   └── admin-styles.css     # WordPress admin styles
│   ├── js/
│   │   └── custom-scripts.js    # Animations, counters, scroll effects
│   └── images/                  # Logo, favicon, placeholder images
├── includes/
│   └── template-functions.php   # PHP helper functions for templates
├── layouts/
│   ├── homepage-layout.json     # Homepage section blueprint
│   ├── services-layout.json     # Services page blueprint
│   ├── about-layout.json        # About page blueprint
│   └── contact-layout.json      # Contact page blueprint
├── divi-theme-options.json      # Recommended Divi settings
└── SETUP.md                     # This file
```

---

## Customization Notes

- **Phone number:** Search and replace `(555) 123-4567` with your actual number throughout the theme files
- **Email:** Replace `info@tcintegritytrash.com` with your actual email
- **Service areas:** Update the service area content and map location
- **Photos:** Replace placeholder references with actual before/after photos, team photos, and truck images
- **Google Analytics:** Add tracking code via Divi > Theme Options > Integration or use MonsterInsights plugin
- **Schema markup:** Update the business schema in `functions.php` with your actual address and coordinates

---

## Recommended Plugins

- **Yoast SEO** — Local SEO and schema markup
- **WPForms Lite** — Advanced contact forms (optional, Divi has built-in forms)
- **Smush** — Image optimization
- **WP Rocket** — Page speed caching
- **MonsterInsights** — Google Analytics
