#!/usr/bin/env python3
"""
Generate Divi 5 native layout JSON files for T&C Integrity.
Uses the WordPress block comment format that Divi 5.2.1 expects.
"""
import json
from datetime import datetime

V = "5.2.1"
NOW = "2026-04-15 05:00:00"

def section(content, bg="#ffffff", padding="80px||80px||true|false", gradient=None, fullwidth=False):
    attrs = {"builderVersion": V, "module": {"decoration": {"background": {"desktop": {"value": {"color": bg}}}}}}
    if gradient:
        attrs["module"]["decoration"]["background"]["desktop"]["value"] = {
            "gradient": {"stops": gradient, "direction": "135deg"}, "type": "gradient"
        }
    if padding:
        attrs["module"]["advanced"] = {"spacing": {"padding": {"desktop": {"value": padding}}}}
    tag = "divi/fullwidth-section" if fullwidth else "divi/section"
    return f'<!-- wp:{tag} {json.dumps(attrs)} -->\n{content}\n<!-- /wp:{tag} -->'

def row(content, cols="4_4"):
    attrs = {"builderVersion": V, "module": {"advanced": {"columnStructure": {"desktop": {"value": cols}}}}}
    return f'<!-- wp:divi/row {json.dumps(attrs)} -->\n{content}\n<!-- /wp:divi/row -->'

def column(content, col_type="4_4"):
    attrs = {"builderVersion": V, "module": {"advanced": {"type": {"desktop": {"value": col_type}}}}}
    return f'<!-- wp:divi/column {json.dumps(attrs)} -->\n{content}\n<!-- /wp:divi/column -->'

def text(html):
    attrs = {"builderVersion": V}
    return f'<!-- wp:divi/text {json.dumps(attrs)} -->\n{html}\n<!-- /wp:divi/text -->'

def heading(txt, level="h2"):
    attrs = {"builderVersion": V, "module": {"advanced": {"htmlTag": {"desktop": {"value": level}}}}}
    return f'<!-- wp:divi/heading {json.dumps(attrs)} -->\n{txt}\n<!-- /wp:divi/heading -->'

def button(label, url="/contact/"):
    attrs = {"builderVersion": V, "module": {"advanced": {"url": {"desktop": {"value": url}}}}}
    return f'<!-- wp:divi/button {json.dumps(attrs)} -->\n{label}\n<!-- /wp:divi/button -->'

def blurb(title, body):
    attrs = {"builderVersion": V}
    return f'<!-- wp:divi/blurb {json.dumps(attrs)} -->\n<h4>{title}</h4>\n<p>{body}</p>\n<!-- /wp:divi/blurb -->'

def cta(title, body, btn_text="Get a Free Estimate", btn_url="/contact/"):
    attrs = {"builderVersion": V}
    return f'<!-- wp:divi/cta {json.dumps(attrs)} -->\n<h2>{title}</h2>\n<p>{body}</p>\n<!-- /wp:divi/cta -->'

def testimonial(quote, author, role):
    attrs = {"builderVersion": V}
    return f'<!-- wp:divi/testimonial {json.dumps(attrs)} -->\n<p>{quote}</p>\n<cite>{author}, {role}</cite>\n<!-- /wp:divi/testimonial -->'

def number_counter(number, label):
    attrs = {"builderVersion": V, "module": {"advanced": {"number": {"desktop": {"value": str(number)}}}}}
    return f'<!-- wp:divi/number-counter {json.dumps(attrs)} -->\n{label}\n<!-- /wp:divi/number-counter -->'

def accordion_item(question, answer, is_open=False):
    attrs = {"builderVersion": V}
    if is_open:
        attrs["module"] = {"advanced": {"open": {"desktop": {"value": "on"}}}}
    return f'<!-- wp:divi/accordion-item {json.dumps(attrs)} -->\n<h5>{question}</h5>\n<p>{answer}</p>\n<!-- /wp:divi/accordion-item -->'

def accordion(items_content):
    attrs = {"builderVersion": V}
    return f'<!-- wp:divi/accordion {json.dumps(attrs)} -->\n{items_content}\n<!-- /wp:divi/accordion -->'

def wrap(content):
    return f'<!-- wp:divi/placeholder -->\n{content}\n<!-- /wp:divi/placeholder -->'

def make_layout(post_id, title, slug, content, layout_type="layout"):
    terms = {}
    if layout_type == "layout":
        terms = {"3": {"name": "layout", "slug": "layout", "taxonomy": "layout_type", "parent": 0, "all_parents": [], "description": ""}}
    return {
        "ID": post_id,
        "post_date": NOW,
        "post_date_gmt": NOW,
        "post_content": content,
        "post_title": title,
        "post_excerpt": "",
        "post_status": "publish",
        "comment_status": "closed",
        "ping_status": "closed",
        "post_password": "",
        "post_name": slug,
        "to_ping": "",
        "pinged": "",
        "post_modified": NOW,
        "post_modified_gmt": NOW,
        "post_content_filtered": "",
        "post_parent": 0,
        "menu_order": 0,
        "post_type": "et_pb_layout",
        "post_mime_type": "",
        "comment_count": "0",
        "filter": "raw",
        "post_meta": {
            "_et_pb_built_for_post_type": ["page"]
        },
        "terms": terms
    }

def get_global_colors():
    return [
        {"id": "gcid-color-primary-dark", "color": "#1B5E20", "label": "Primary Dark Green"},
        {"id": "gcid-color-primary", "color": "#2E7D32", "label": "Primary Green"},
        {"id": "gcid-color-accent", "color": "#4CAF50", "label": "Accent Green"},
        {"id": "gcid-color-light-green", "color": "#81C784", "label": "Light Green"},
        {"id": "gcid-color-pale-green", "color": "#E8F5E9", "label": "Pale Green"},
        {"id": "gcid-color-bg-light", "color": "#f5f9f3", "label": "Light Background"},
        {"id": "gcid-color-gold", "color": "#C9A84C", "label": "Gold Accent"},
        {"id": "gcid-color-dark-text", "color": "#1a2e1a", "label": "Dark Text"},
        {"id": "gcid-color-body-text", "color": "#333333", "label": "Body Text"},
        {"id": "gcid-color-muted-text", "color": "#666666", "label": "Muted Text"},
        {"id": "gcid-color-white", "color": "#ffffff", "label": "White"},
        {"id": "gcid-color-footer-bg", "color": "#0d1f0d", "label": "Footer Dark"},
        {"id": "gcid-color-success", "color": "#4CAF50", "label": "Success"},
        {"id": "gcid-color-warning", "color": "#FF9800", "label": "Warning"},
        {"id": "gcid-color-error", "color": "#F44336", "label": "Error"},
    ]

def get_global_variables():
    vars = []
    var_defs = [
        ("gvid-color-primary-dark", "colors", "Primary Dark Green", "#1B5E20"),
        ("gvid-color-primary", "colors", "Primary Green", "#2E7D32"),
        ("gvid-color-accent", "colors", "Accent Green", "#4CAF50"),
        ("gvid-color-light-green", "colors", "Light Green", "#81C784"),
        ("gvid-color-pale-green", "colors", "Pale Green", "#E8F5E9"),
        ("gvid-color-bg-light", "colors", "Light Background", "#f5f9f3"),
        ("gvid-color-gold", "colors", "Gold Accent", "#C9A84C"),
        ("gvid-color-dark-text", "colors", "Dark Text", "#1a2e1a"),
        ("gvid-color-body-text", "colors", "Body Text", "#333333"),
        ("gvid-color-white", "colors", "White", "#ffffff"),
        ("gvid-color-overlay-dark", "colors", "Dark Overlay", "rgba(27,94,32,0.85)"),
        ("gvid-font-heading", "fonts", "Heading Font", "Montserrat"),
        ("gvid-font-body", "fonts", "Body Font", "Open Sans"),
        ("gvid-type-h1-size", "numbers", "H1 Size", "48px"),
        ("gvid-type-h2-size", "numbers", "H2 Size", "36px"),
        ("gvid-type-h3-size", "numbers", "H3 Size", "28px"),
        ("gvid-type-h4-size", "numbers", "H4 Size", "22px"),
        ("gvid-type-body-size", "numbers", "Body Font Size", "16px"),
        ("gvid-type-small-size", "numbers", "Small Text Size", "14px"),
        ("gvid-type-button-size", "numbers", "Button Text Size", "16px"),
        ("gvid-space-sm", "numbers", "Space SM", "16px"),
        ("gvid-space-md", "numbers", "Space MD", "24px"),
        ("gvid-space-lg", "numbers", "Space LG", "40px"),
        ("gvid-space-xl", "numbers", "Space XL", "60px"),
        ("gvid-space-section", "numbers", "Section Padding", "80px"),
        ("gvid-space-hero", "numbers", "Hero Padding", "120px"),
        ("gvid-layout-container", "numbers", "Container Max Width", "1200px"),
        ("gvid-radius-sm", "numbers", "Radius Small", "4px"),
        ("gvid-radius-md", "numbers", "Radius Medium", "8px"),
        ("gvid-radius-pill", "numbers", "Radius Pill", "50px"),
        ("gvid-string-company-name", "strings", "Company Name", "T&C Integrity & Reliable Trash Services"),
        ("gvid-string-phone", "strings", "Phone Number", "(555) 123-4567"),
        ("gvid-string-email", "strings", "Email", "info@tcintegritytrash.com"),
        ("gvid-string-hours", "strings", "Business Hours", "Mon-Sat: 7AM - 7PM"),
        ("gvid-string-cta-primary", "strings", "Primary CTA Text", "Get a Free Estimate"),
        ("gvid-string-copyright", "strings", "Copyright", "© 2026 T&C Integrity & Reliable Trash Services. All rights reserved."),
        ("gvid-link-site", "links", "Website URL", "https://tcintegritytrash.com"),
        ("gvid-link-contact", "links", "Contact Page", "/contact/"),
        ("gvid-link-phone", "links", "Phone Link", "tel:+15551234567"),
        ("gvid-link-email", "links", "Email Link", "mailto:info@tcintegritytrash.com"),
    ]
    for vid, vtype, name, value in var_defs:
        vars.append({"id": vid, "type": vtype, "name": name, "value": value})
    return vars

def make_export(layouts, include_design_system=True):
    data = {}
    for l in layouts:
        data[str(l["ID"])] = l
    export = {
        "context": "et_builder_layouts",
        "data": data,
        "presets": "",
        "global_colors": get_global_colors() if include_design_system else [],
        "global_variables": get_global_variables() if include_design_system else [],
        "canvases": [],
        "images": [],
        "thumbnails": []
    }
    return export

# ============================================================
# HOMEPAGE
# ============================================================
def build_homepage():
    sections = []

    # Hero
    hero_content = row(column(text(
        '<h1 style="text-align:center;color:#ffffff;font-family:Montserrat;font-size:48px;font-weight:800;">Professional Eviction Junk Removal &amp; Deep Cleaning</h1>'
        '<p style="text-align:center;color:rgba(255,255,255,0.95);font-size:18px;">T&amp;C Integrity &amp; Reliable Trash Services — trusted by property managers, landlords, and homeowners for fast, thorough, and affordable cleanout solutions.</p>'
        '<p style="text-align:center;"><a href="/contact/" style="background:#4CAF50;color:#fff;padding:16px 40px;border-radius:50px;text-decoration:none;font-family:Montserrat;font-weight:700;text-transform:uppercase;letter-spacing:1px;display:inline-block;margin:8px;">Get a Free Estimate</a> '
        '<a href="tel:+15551234567" style="border:2px solid #fff;color:#fff;padding:16px 40px;border-radius:50px;text-decoration:none;font-family:Montserrat;font-weight:700;text-transform:uppercase;letter-spacing:1px;display:inline-block;margin:8px;">Call Now</a></p>'
    )))
    sections.append(section(hero_content, bg="#1B5E20", padding="120px||120px||true|false"))

    # Trust bar
    trust_cols = ""
    for title, desc in [
        ("Licensed &amp; Insured", "Fully licensed and insured for your protection and peace of mind."),
        ("Eco-Friendly", "We recycle and donate usable items to minimize landfill waste."),
        ("Same-Day Service", "Urgent cleanout? We offer same-day and next-day scheduling."),
        ("Upfront Pricing", "No hidden fees. Get a transparent quote before any work begins."),
    ]:
        trust_cols += column(blurb(title, desc), "1_4")
    sections.append(section(row(trust_cols, "1_4,1_4,1_4,1_4"), bg="#f5f9f3", padding="60px||60px||true|false"))

    # Services
    svc_heading = row(column(text('<h2 style="text-align:center;font-family:Montserrat;color:#1a2e1a;">Our Services</h2><p style="text-align:center;color:#666;">From eviction cleanouts to deep cleaning — we handle it all with integrity and professionalism.</p>')))
    services = [
        ("Eviction Junk Removal", "Complete property cleanouts after eviction. We remove all debris, abandoned belongings, and hazardous materials, leaving the unit turnover-ready."),
        ("Deep Cleaning Services", "Professional deep cleaning for post-eviction, move-in/move-out, and property rehabilitation. Every surface sanitized and restored."),
        ("Furniture &amp; Appliance Removal", "Heavy items hauled away responsibly. Couches, mattresses, refrigerators, washers — we handle the heavy lifting."),
    ]
    svc_row1 = ""
    for t, d in services:
        svc_row1 += column(blurb(t, d), "1_3")
    services2 = [
        ("Property Cleanout", "Full estate or rental property cleanouts. We clear everything from attic to basement efficiently."),
        ("Debris &amp; Construction Cleanup", "Post-renovation debris removal. Drywall, lumber, tile, flooring — removed and hauled to proper disposal."),
        ("Yard Waste &amp; Outdoor Cleanup", "Overgrown yards, fallen branches, old fencing cleared to improve curb appeal and property value."),
    ]
    svc_row2 = ""
    for t, d in services2:
        svc_row2 += column(blurb(t, d), "1_3")
    svc_btn = row(column(button("View All Services", "/services/")))
    sections.append(section(svc_heading + row(svc_row1, "1_3,1_3,1_3") + row(svc_row2, "1_3,1_3,1_3") + svc_btn))

    # How it works
    hw_heading = row(column(text('<h2 style="text-align:center;font-family:Montserrat;color:#1a2e1a;">How It Works</h2><p style="text-align:center;color:#666;">Three simple steps to a clean property.</p>')))
    steps = ""
    for t, d in [
        ("1. Book Your Estimate", "Call us or fill out our online form. We'll schedule a free, no-obligation on-site estimate."),
        ("2. We Do the Work", "Our professional crew arrives on time, removes all junk, and performs deep cleaning as needed."),
        ("3. Property Ready", "Your property is clean, sanitized, and ready for new tenants, sale, or renovation."),
    ]:
        steps += column(blurb(t, d), "1_3")
    sections.append(section(hw_heading + row(steps, "1_3,1_3,1_3"), bg="#f5f9f3"))

    # Stats
    stats = ""
    for num, label in [("500", "Properties Cleaned"), ("100", "5-Star Reviews"), ("10", "Years Experience"), ("98", "Satisfaction Rate")]:
        stats += column(number_counter(num, label), "1_4")
    sections.append(section(row(stats, "1_4,1_4,1_4,1_4"), padding="50px||50px||true|false",
                            gradient=[{"color": "#1B5E20", "position": 0}, {"color": "#2E7D32", "position": 100}]))

    # Why choose us
    why_content = ""
    why_content += column(text('<p style="text-align:center;color:#999;font-style:italic;">[Upload team or truck photo here]</p>'), "1_2")
    why_content += column(text(
        '<h2 style="font-family:Montserrat;color:#1a2e1a;">Why Choose T&amp;C Integrity?</h2>'
        '<p>We built our reputation on doing things right — with honesty, hard work, and attention to detail.</p>'
        '<ul><li>Fully licensed, bonded, and insured</li>'
        '<li>Background-checked, professional crew</li>'
        '<li>Eco-friendly disposal and recycling</li>'
        '<li>Transparent, upfront pricing — no surprises</li>'
        '<li>Same-day and emergency service available</li>'
        '<li>Serving property managers, realtors, and homeowners</li></ul>'
    ) + button("Get Your Free Estimate"), "1_2")
    sections.append(section(row(why_content, "1_2,1_2")))

    # Testimonials
    test_heading = row(column(text('<h2 style="text-align:center;font-family:Montserrat;color:#1a2e1a;">What Our Clients Say</h2>')))
    tests = ""
    for q, a, r in [
        ("T&amp;C handled an eviction cleanout for me and had the unit turnover-ready in less than 24 hours. Professional, thorough, and affordable.", "Sarah M.", "Property Manager"),
        ("I've used several junk removal companies and T&amp;C is by far the best. Their deep cleaning service is top-notch.", "Marcus J.", "Landlord"),
        ("After my mother passed, T&amp;C helped clear out her house with care and respect. They donated what they could.", "Linda P.", "Homeowner"),
    ]:
        tests += column(testimonial(q, a, r), "1_3")
    sections.append(section(test_heading + row(tests, "1_3,1_3,1_3"), bg="#f5f9f3"))

    # CTA
    cta_content = row(column(cta(
        "Ready for a Clean Start?",
        "Get a free, no-obligation estimate today. We'll have your property looking its best — fast."
    )))
    sections.append(section(cta_content, padding="70px||70px||true|false",
                            gradient=[{"color": "#1B5E20", "position": 0}, {"color": "#2E7D32", "position": 100}]))

    # Service areas
    areas_heading = row(column(text('<h2 style="text-align:center;font-family:Montserrat;color:#1a2e1a;">Areas We Serve</h2>')))
    areas = ""
    areas += column(text('<h4>Houston Metro</h4><ul><li><a href="/service-area/houston/">Houston</a></li><li><a href="/service-area/sugar-land/">Sugar Land</a></li><li><a href="/service-area/missouri-city/">Missouri City</a></li></ul>'), "1_3")
    areas += column(text('<h4>West Houston</h4><ul><li><a href="/service-area/katy/">Katy</a></li><li><a href="/service-area/cypress/">Cypress</a></li><li><a href="/service-area/richmond/">Richmond</a></li></ul>'), "1_3")
    areas += column(text('<h4>Central Texas</h4><ul><li><a href="/service-area/rosenberg/">Rosenberg</a></li><li><a href="/service-area/college-station/">College Station</a></li><li><a href="/service-area/brenham/">Brenham</a></li></ul>'), "1_3")
    sections.append(section(areas_heading + row(areas, "1_3,1_3,1_3"), padding="60px||60px||true|false"))

    return wrap("\n".join(sections))

# ============================================================
# SERVICES PAGE
# ============================================================
def build_services():
    sections = []

    # Hero
    hero = row(column(text(
        '<h1 style="text-align:center;color:#fff;font-family:Montserrat;font-size:48px;font-weight:800;">Our Services</h1>'
        '<p style="text-align:center;color:rgba(255,255,255,0.95);font-size:18px;">Comprehensive junk removal and deep cleaning solutions for every property need.</p>'
    )))
    sections.append(section(hero, bg="#1B5E20", padding="120px||120px||true|false"))

    svc_data = [
        ("Eviction Junk Removal", "When tenants leave behind a mess, we make it disappear.", "<ul><li>Abandoned furniture and personal belongings</li><li>Old mattresses, box springs, and bedding</li><li>Appliances (refrigerators, stoves, washers, dryers)</li><li>Electronics and e-waste</li><li>Trash bags, loose debris, and clutter</li><li>Hazardous materials (with proper handling)</li></ul><p><strong>Typical turnaround:</strong> 1-2 days from booking to completion.</p>", "Schedule a Cleanout"),
        ("Deep Cleaning Services", "Our professional deep cleaning restores properties to move-in ready condition.", "<ul><li>Kitchen deep clean — cabinets, appliances, counters, floors</li><li>Bathroom sanitization — toilets, tubs, tile, grout</li><li>Floor cleaning — sweep, mop, vacuum all surfaces</li><li>Wall and baseboard washing</li><li>Carpet shampooing and stain treatment</li><li>Odor removal and deodorizing</li></ul>", "Book a Deep Clean"),
        ("Furniture &amp; Appliance Removal", "Heavy, bulky items that regular trash won't take? That's our specialty.", "<ul><li>Sofas, recliners, and sectionals</li><li>Mattresses and bed frames</li><li>Dining tables, desks, and dressers</li><li>Refrigerators, ovens, dishwashers</li><li>Washers, dryers, and water heaters</li><li>TVs, computers, and electronics</li></ul>", "Get a Quote"),
        ("Full Property Cleanout", "Estate cleanout, foreclosure, hoarding, or rental turnover — we clear it all.", "<ul><li>Estate and inheritance cleanouts</li><li>Foreclosure property clearing</li><li>Hoarding cleanup (compassionate, discreet)</li><li>Rental property turnovers</li><li>Garage, attic, and basement clearing</li><li>Storage unit cleanouts</li></ul>", "Schedule a Cleanout"),
        ("Debris Removal &amp; Yard Cleanup", "Construction leftovers to overgrown yards — we haul it all away.", "<ul><li>Construction and renovation debris</li><li>Drywall, lumber, tile, and flooring removal</li><li>Yard waste — branches, stumps, leaves</li><li>Old fencing, sheds, and outdoor structures</li><li>Hot tub and play equipment removal</li><li>Gravel, dirt, and concrete hauling</li></ul>", "Get a Free Estimate"),
    ]

    bgs = ["#ffffff", "#f5f9f3", "#ffffff", "#f5f9f3", "#ffffff"]
    for i, (title, intro, items, btn_text) in enumerate(svc_data):
        img_col = column(text('<p style="text-align:center;color:#999;font-style:italic;">[Upload photo here]</p>'), "1_2")
        txt_col = column(text(f'<h2 style="font-family:Montserrat;color:#1a2e1a;">{title}</h2><p>{intro}</p>{items}') + button(btn_text), "1_2")
        if i % 2 == 0:
            r = row(img_col + txt_col, "1_2,1_2")
        else:
            r = row(txt_col + img_col, "1_2,1_2")
        sections.append(section(r, bg=bgs[i]))

    # CTA
    sections.append(section(row(column(cta("Need a Custom Solution?", "Contact us for a personalized plan and free estimate tailored to your needs."))),
                            padding="70px||70px||true|false",
                            gradient=[{"color": "#1B5E20", "position": 0}, {"color": "#2E7D32", "position": 100}]))

    return wrap("\n".join(sections))

# ============================================================
# ABOUT PAGE
# ============================================================
def build_about():
    sections = []

    hero = row(column(text(
        '<h1 style="text-align:center;color:#fff;font-family:Montserrat;font-size:48px;font-weight:800;">About T&amp;C Integrity &amp; Reliable</h1>'
        '<p style="text-align:center;color:rgba(255,255,255,0.95);font-size:18px;">Built on integrity. Driven by reliability. Dedicated to serving our community.</p>'
    )))
    sections.append(section(hero, bg="#1B5E20", padding="120px||120px||true|false"))

    story_img = column(text('<p style="text-align:center;color:#999;font-style:italic;">[Upload team/founder photo here]</p>'), "1_2")
    story_txt = column(text(
        '<h2 style="font-family:Montserrat;color:#1a2e1a;">Our Story</h2>'
        '<p>T&amp;C Integrity &amp; Reliable Trash Services was founded with a simple mission: provide honest, hardworking junk removal and cleaning services that people can actually count on.</p>'
        '<p>We saw too many property managers frustrated by no-shows, hidden fees, and sloppy work. We knew there had to be a better way — and that\'s exactly what we built.</p>'
        '<p>Today, we\'re the go-to eviction junk removal and deep cleaning company for property managers, landlords, and homeowners throughout the Houston metro and Central Texas.</p>'
    ), "1_2")
    sections.append(section(row(story_img + story_txt, "1_2,1_2")))

    values_heading = row(column(text('<h2 style="text-align:center;font-family:Montserrat;color:#1a2e1a;">Our Core Values</h2>')))
    vals = ""
    for t, d in [
        ("Integrity", "We do what we say we'll do. Honest pricing, honest timelines, honest work — every time."),
        ("Reliability", "When we say we'll be there, we're there. On time. Prepared. Ready to work."),
        ("Community", "We donate usable items to local shelters. We recycle responsibly. We take care of our neighbors."),
    ]:
        vals += column(blurb(t, d), "1_3")
    sections.append(section(values_heading + row(vals, "1_3,1_3,1_3"), bg="#f5f9f3"))

    trust_heading = row(column(text('<h2 style="text-align:center;font-family:Montserrat;color:#1a2e1a;">Why Property Managers Trust Us</h2>')))
    trust_l = column(text('<ul><li><strong>Fast Turnaround</strong> — Most cleanouts done in 24-48 hours</li><li><strong>One-Stop Solution</strong> — Junk removal AND deep cleaning</li><li><strong>Volume Discounts</strong> — Special pricing for multiple units</li><li><strong>Before/After Docs</strong> — Photo documentation</li><li><strong>Flexible Scheduling</strong> — Early, evening, weekend</li><li><strong>Clear Communication</strong> — Updates, no ghosting</li></ul>'), "1_2")
    trust_r = column(text('<ul><li><strong>Fully Insured</strong> — Liability and workers\' comp</li><li><strong>Background-Checked</strong> — Every member vetted</li><li><strong>Eco-Responsible</strong> — Recycle, donate first</li><li><strong>No Hidden Fees</strong> — Quote = final price</li><li><strong>Satisfaction Guarantee</strong> — Not done until you\'re satisfied</li><li><strong>Property-Ready</strong> — Show-ready condition</li></ul>'), "1_2")
    sections.append(section(trust_heading + row(trust_l + trust_r, "1_2,1_2")))

    sections.append(section(row(column(cta("Let's Work Together", "Whether you manage one property or one hundred, T&amp;C Integrity is your trusted cleanup partner."))),
                            padding="70px||70px||true|false",
                            gradient=[{"color": "#1B5E20", "position": 0}, {"color": "#2E7D32", "position": 100}]))

    return wrap("\n".join(sections))

# ============================================================
# CONTACT PAGE
# ============================================================
def build_contact():
    sections = []

    hero = row(column(text(
        '<h1 style="text-align:center;color:#fff;font-family:Montserrat;font-size:48px;font-weight:800;">Contact Us</h1>'
        '<p style="text-align:center;color:rgba(255,255,255,0.95);font-size:18px;">Get a free estimate or schedule your eviction cleanout and deep cleaning today.</p>'
    )))
    sections.append(section(hero, bg="#1B5E20", padding="120px||120px||true|false"))

    info = column(text(
        '<h2 style="font-family:Montserrat;color:#1a2e1a;">Get in Touch</h2>'
        '<p>Fill out the form and we\'ll get back to you within 1 business hour. For urgent requests, call us.</p>'
        '<h4>Phone</h4><p><a href="tel:+15551234567" style="color:#2E7D32;font-weight:700;font-size:1.2em;">(555) 123-4567</a></p>'
        '<h4>Email</h4><p><a href="mailto:info@tcintegritytrash.com">info@tcintegritytrash.com</a></p>'
        '<h4>Hours</h4><p>Monday - Saturday: 7:00 AM - 7:00 PM<br>Sunday: By Appointment Only</p>'
        '<h4>Service Area</h4><p>Houston, Sugar Land, Missouri City, Katy, Cypress, Richmond, Rosenberg, College Station, Brenham, and surrounding areas.</p>'
    ), "1_2")
    form = column(text(
        '<div style="background:#f5f9f3;padding:30px;border-radius:8px;">'
        '<h3 style="font-family:Montserrat;color:#1B5E20;margin-top:0;">Request a Free Estimate</h3>'
        '<p style="color:#666;">Use the Divi Contact Form module here with fields for: Name, Email, Phone, Service Needed (dropdown), Tell Us About Your Project (textarea).</p>'
        '<p style="color:#999;font-style:italic;">[Replace this text module with a Divi Contact Form module in the Visual Builder]</p>'
        '</div>'
    ), "1_2")
    sections.append(section(row(info + form, "1_2,1_2")))

    faq_heading = row(column(text('<h2 style="text-align:center;font-family:Montserrat;color:#1a2e1a;">Frequently Asked Questions</h2>')))
    faqs = ""
    faq_data = [
        ("How quickly can you schedule a cleanout?", "We offer same-day and next-day service for most jobs. For eviction cleanouts, we understand urgency is key — call us and we'll work to accommodate your timeline.", True),
        ("How much does eviction junk removal cost?", "Pricing depends on volume, property size, and services needed. We provide free, no-obligation on-site estimates. No hidden fees — the price we quote is the price you pay.", False),
        ("Do you offer deep cleaning with junk removal?", "Yes! We offer both junk removal AND deep cleaning as a combined service. One team, one schedule, one invoice — saving you time and money.", False),
        ("What happens to the items you remove?", "Usable items are donated to local charities. Recyclable materials go to appropriate facilities. We minimize landfill waste wherever possible.", False),
        ("Are you licensed and insured?", "Absolutely. T&amp;C Integrity is fully licensed, bonded, and insured with general liability and workers' compensation coverage.", False),
        ("Do you work with property management companies?", "Yes — we offer volume discounts, priority scheduling, and dedicated account support for property management companies.", False),
        ("What areas do you serve?", "Houston, Sugar Land, Missouri City, Katy, Cypress, Richmond, Rosenberg, College Station, Brenham, and surrounding communities.", False),
    ]
    for q, a, is_open in faq_data:
        faqs += accordion_item(q, a, is_open)
    sections.append(section(faq_heading + row(column(accordion(faqs))), bg="#f5f9f3"))

    return wrap("\n".join(sections))


# ============================================================
# ASSEMBLE AND WRITE
# ============================================================
outdir = "/home/user/T-and-C/tc-integrity-divi-child/divi5-layouts"
ds_outdir = "/home/user/T-and-C/tc-integrity-divi-child/divi5-design-system"

layouts = [
    make_layout(1001, "TC Integrity - Homepage", "tc-integrity-homepage", build_homepage()),
    make_layout(1002, "TC Integrity - Services", "tc-integrity-services", build_services()),
    make_layout(1003, "TC Integrity - About", "tc-integrity-about", build_about()),
    make_layout(1004, "TC Integrity - Contact", "tc-integrity-contact", build_contact()),
]

# 1. Full export: pages + design system (colors, variables)
export_full = make_export(layouts, include_design_system=True)
with open(f"{outdir}/TC-Integrity_Pages.json", "w") as f:
    json.dump(export_full, f, ensure_ascii=False)
    print(f"Written: TC-Integrity_Pages.json ({len(json.dumps(export_full))} bytes)")

# 2. Standalone global variables file (same working format, no layouts)
vars_export = {
    "context": "et_builder_layouts",
    "data": {},
    "presets": "",
    "global_colors": get_global_colors(),
    "global_variables": get_global_variables(),
    "canvases": [],
    "images": [],
    "thumbnails": []
}
with open(f"{ds_outdir}/TC-Integrity_Global-Variables.json", "w") as f:
    json.dump(vars_export, f, ensure_ascii=False, indent=2)
    print(f"Written: TC-Integrity_Global-Variables.json ({len(json.dumps(vars_export))} bytes)")

print("Done!")
