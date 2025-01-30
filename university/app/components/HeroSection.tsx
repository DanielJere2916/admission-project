import Link from "next/link"

const HeroSection = () => {
  return (
    <section className="relative h-screen flex items-center justify-center text-white">
      <div className="absolute inset-0 bg-black opacity-50 z-0"></div>
      <div
        className="absolute inset-0 bg-cover bg-center z-0"
        style={{ backgroundImage: "url('/hero-background.jpg')" }}
      ></div>
      <div className="relative z-10 text-center max-w-4xl mx-auto px-4">
        <h1 className="text-5xl md:text-6xl font-bold mb-4 leading-tight">Courage, Excellence, Confidence</h1>
        <p className="text-xl md:text-2xl mb-8 leading-relaxed">Start Your Journey at Malawi's Premier University</p>
        <div className="space-x-4">
          <Link
            href="/apply"
            className="bg-primary hover:bg-primary-dark text-white font-bold py-3 px-6 rounded-full transition-all duration-300 hover:scale-105 inline-block"
          >
            Apply Now
          </Link>
          <Link
            href="/programmes"
            className="bg-transparent hover:bg-white text-white hover:text-primary font-bold py-3 px-6 rounded-full border-2 border-white transition-all duration-300 hover:scale-105 inline-block"
          >
            Explore Programmes
          </Link>
        </div>
      </div>
    </section>
  )
}

export default HeroSection

