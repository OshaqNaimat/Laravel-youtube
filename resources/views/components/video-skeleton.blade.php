<x-layout>
    <style>
        .skeleton {
            background: linear-gradient(90deg, #1f1f1f 25%, #2a2a2a 50%, #1f1f1f 75%);
            background-size: 600px 100%;
            animation: shimmer 1.6s infinite linear;
            border-radius: 6px;
        }

        @keyframes shimmer {
            0% {
                background-position: -600px 0;
            }

            100% {
                background-position: 600px 0;
            }
        }
    </style>
    <div style="display: flex; flex-direction: row; gap: 16px;" class="video-skeleton">
        <!-- Thumbnail skeleton -->
        <div style="position: relative; width: 400px; flex-shrink: 0;">
            <div class="skeleton" style="width: 100%; height: 220px; border-radius: 12px;"></div>
            <div class="skeleton"
                style="position: absolute; bottom: 10px; right: 10px; width: 36px; height: 20px; border-radius: 4px;">
            </div>
        </div>

        <!-- Info skeleton -->
        <div style="display: flex; flex-direction: column; gap: 10px; flex: 1; padding-top: 4px;">
            <div class="skeleton" style="height: 22px; width: 90%;"></div>
            <div class="skeleton" style="height: 22px; width: 70%;"></div>
            <div class="skeleton" style="height: 14px; width: 40%;"></div>
            <div style="display: flex; align-items: center; gap: 8px;">
                <div class="skeleton" style="width: 32px; height: 32px; border-radius: 50%;"></div>
                <div class="skeleton" style="height: 14px; width: 80px;"></div>
            </div>
            <div class="skeleton" style="height: 13px; width: 95%;"></div>
            <div class="skeleton" style="height: 13px; width: 75%;"></div>
        </div>
    </div>
</x-layout>
