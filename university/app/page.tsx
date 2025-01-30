import Navbar from "./components/Navbar"
import HeroSection from "./components/HeroSection"
import QuickStatsBanner from "./components/QuickStatsBanner"
import FeaturedProgrammes from "./components/FeaturedProgrammes"
import WhyChooseUs from "./components/WhyChooseUs"
import CampusInfo from "./components/CampusInfo"
import ApplicationProcess from "./components/ApplicationProcess"
import Testimonials from "./components/Testimonials"
import UpcomingEvents from "./components/UpcomingEvents"
import RecentNews from "./components/RecentNews"
import Footer from "./components/Footer"
import BackToTop from "./components/BackToTop"
import LiveChat from "./components/LiveChat"
import FAQSection from "./components/FAQSection"

export default function Home() {
  return (
    <main className="min-h-screen">
      <Navbar />
      <HeroSection />
      <QuickStatsBanner />
      <FeaturedProgrammes />
      <WhyChooseUs />
      <CampusInfo />
      <ApplicationProcess />
      <Testimonials />
      <UpcomingEvents />
      <RecentNews />
      <FAQSection />
      <Footer />
      <BackToTop />
      <LiveChat />
    </main>
  )
}

