function calculateContrastRatio(colorA, colorB) {
    // Color Conversion Functions
    function hexToRGB(hex) {
        var shorthandRegex = /^#?([a-f\d])([a-f\d])([a-f\d])$/i;
        hex = hex.replace(shorthandRegex, function (m, r, g, b) {
            return r + r + g + g + b + b;
        });

        var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
        return result
            ? {
                  r: parseInt(result[1], 16),
                  g: parseInt(result[2], 16),
                  b: parseInt(result[3], 16),
              }
            : null;
    }

    function getLuminance(color) {
        var rgb = color;
        if (typeof color === "string") {
            rgb = hexToRGB(color);
        }

        var sRGB = {
            r: rgb.r / 255,
            g: rgb.g / 255,
            b: rgb.b / 255,
        };

        var lRGB = {
            r: applySRGBCorrection(sRGB.r),
            g: applySRGBCorrection(sRGB.g),
            b: applySRGBCorrection(sRGB.b),
        };

        return 0.2126 * lRGB.r + 0.7152 * lRGB.g + 0.0722 * lRGB.b;
    }

    function applySRGBCorrection(color) {
        if (color <= 0.03928) {
            return color / 12.92;
        } else {
            return Math.pow((color + 0.055) / 1.055, 2.4);
        }
    }

    // Contrast Ratio Calculation
    var luminanceA = getLuminance(colorA);
    var luminanceB = getLuminance(colorB);

    var ratio =
        (Math.max(luminanceA, luminanceB) + 0.05) /
        (Math.min(luminanceA, luminanceB) + 0.05);
    ratio = Math.round(ratio * 10) / 10; // Round to 1 decimal place

    return ratio;
}

function isContrastRatioValid(colorA, colorB, fontSize = 14) {
    var contrastRatio = calculateContrastRatio(colorA, colorB);

    // WCAG 2.0 AA Guidelines
    if (fontSize >= 18) {
        return contrastRatio >= 3.0;
    } else {
        return contrastRatio >= 4.5;
    }
}

document.addEventListener("DOMContentLoaded", (event) => {
    var projectHero = document.querySelector(".single-project__hero");

    if (projectHero) {
        var styles = window.getComputedStyle(projectHero);
        var projectHeroBackground = styles.getPropertyValue("background-color");

        var rgbToHex = function (rgb) {
            var rgbValues = rgb.match(/\d+/g);
            var r = parseInt(rgbValues[0]);
            var g = parseInt(rgbValues[1]);
            var b = parseInt(rgbValues[2]);

            var rHex = r.toString(16).padStart(2, "0");
            var gHex = g.toString(16).padStart(2, "0");
            var bHex = b.toString(16).padStart(2, "0");

            var hexCode = "#" + rHex + gHex + bHex;

            return hexCode;
        };

        var projectHeroHexBackground = rgbToHex(projectHeroBackground);

        var backgroundColor = projectHeroHexBackground;
        var foregroundColor = "#ffffff";

        var isValid = isContrastRatioValid(foregroundColor, backgroundColor);
        const documentBody = document.querySelector("body");

        if (isValid == true) {
            // If true, add a wcag-true class which will update the header and hero section to the light version
            documentBody.classList.add("wcag-true");
        } else {
            // No changes required
        }
    }
});
