declare module "@primeuix/themes" {
  export interface ThemeColors {
    [key: string]: string | Record<number | string, string>;
  }

  export interface ThemePreset {
    semantic?: {
      primary?: ThemeColors;
      secondary?: ThemeColors;
      colorScheme?: {
        light?: Record<string, ThemeColors>;
        dark?: Record<string, ThemeColors>;
      };
      [key: string]: ThemeColors | any;
    };
  }

  /**
   * Define a new PrimeVue theme preset by extending an existing one.
   * @param base The base preset (e.g., Aura).
   * @param config Custom theme overrides.
   */
  export function definePreset(base: any, config: ThemePreset): ThemePreset;
}
